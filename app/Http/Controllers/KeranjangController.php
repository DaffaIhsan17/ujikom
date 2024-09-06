<?php

namespace App\Http\Controllers;

use App\Models\Pesanan;
use App\Models\Produks;
use App\Models\Keranjang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class KeranjangController extends Controller
{
    public function destroy($id)
    {
        $item = Keranjang::findOrFail($id);
        $item->delete();

        return response()->json(['success' => 'Item berhasil dihapus']);
    }

    public function checkout(Request $request)
    {
        $selectedItems = $request->input('selectedItems', []);

        if (empty($selectedItems)) {
            return redirect()->back()->with('error', 'Tidak ada item yang dipilih.');
        }
        DB::transaction(function () use ($selectedItems) {
            foreach ($selectedItems as $itemId) {
                $keranjangItem = Keranjang::find($itemId);
                $pemesan = auth('siswa')->user()->id;

                if ($keranjangItem) {

                    $produk = Produks::where('nama', $keranjangItem->nama)->first();

                    if ($produk && $produk->stok >= $keranjangItem->jumlah) {
                        $produk->stok -= $keranjangItem->jumlah;
                        $produk->save();
                        Pesanan::create([
                            'nama' => $keranjangItem->nama,
                            'harga' => $keranjangItem->harga,
                            'foto' => $keranjangItem->foto,
                            'level' => $keranjangItem->level,
                            'jumlah' => $keranjangItem->jumlah,
                            'status' => 'Sedang diproses',
                            'kantin_id' => $keranjangItem->kantin_id,
                            'pemesan_id' => $pemesan
                        ]);
                        $keranjangItem->delete();
                    } else {
                        return redirect()->back()->with('error', 'Stok tidak cukup.');

                    }
                }
            }
        });
        return redirect()->route('pesanan.sedangDiproses')->with('success', 'Pesanan berhasil diproses.');

    }
}
