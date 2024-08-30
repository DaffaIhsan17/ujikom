<?php
namespace App\Http\Controllers;

use App\Models\Pesanan;
use Illuminate\Http\Request;

class PesananController extends Controller
{
    public function sedangDiproses()
    {
        $pesananSedangDiproses = Pesanan::where('status', 'Sedang diproses')->get();
        return view('kantin.pesanan', compact('pesananSedangDiproses'))->with('pageTitle', 'Pesanan Sedang Diproses');
    }

    public function selesai()
    {
        $pesananSelesai = Pesanan::where('status', 'Selesai, silahkan di ambil ke Kantin.')->get();
        return view('kantin.pesanan', compact('pesananSelesai'))->with('pageTitle', 'Pesanan Selesai');
    }
    public function gagal()
    {
        $pesananGagal = Pesanan::where('status', 'Gagal, mohon maaf produk sedang tidak tersedia.')->get();
        return view('kantin.pesanan', compact('pesananGagal'))->with('pageTitle', 'Pesanan Gagal');
    }
}
