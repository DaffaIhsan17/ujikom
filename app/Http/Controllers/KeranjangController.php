<?php

namespace App\Http\Controllers;

use App\Models\Keranjang;
use App\Models\Pesanan;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

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
                }
            }
        });
        return redirect()->route('pesanan.sedangDiproses')->with('success', 'Pesanan berhasil diproses.');

    }
}
