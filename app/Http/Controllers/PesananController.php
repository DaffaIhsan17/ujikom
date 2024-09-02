<?php
namespace App\Http\Controllers;

use App\Models\Pesanan;
use Illuminate\Http\Request;

class PesananController extends Controller
{
    public function sedangDiproses()
{
    $pemesanId = auth('siswa')->user()->id;
    $pesananSedangDiproses = Pesanan::where('status', 'Sedang diproses')
                                     ->where('pemesan_id', $pemesanId)
                                     ->get();
    return view('kantin.pesanan', compact('pesananSedangDiproses'))->with('pageTitle', 'Pesanan Sedang Diproses');
}

public function selesai()
{
    $pemesanId = auth('siswa')->user()->id;
    $pesananSelesai = Pesanan::where('status', 'Selesai, silahkan di ambil ke Kantin.')
                              ->where('pemesan_id', $pemesanId)
                              ->get();
    return view('kantin.pesanan', compact('pesananSelesai'))->with('pageTitle', 'Pesanan Selesai');
}

public function gagal()
{
    $pemesanId = auth('siswa')->user()->id;
    $pesananGagal = Pesanan::where('status', 'Gagal, mohon maaf produk sedang tidak tersedia.')
                            ->where('pemesan_id', $pemesanId)
                            ->get();
    return view('kantin.pesanan', compact('pesananGagal'))->with('pageTitle', 'Pesanan Gagal');
}

}
