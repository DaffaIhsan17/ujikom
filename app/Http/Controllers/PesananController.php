<?php

namespace App\Http\Controllers;

use App\Models\Pesanan;
use Illuminate\Http\Request;

class PesananController extends Controller
{
    public function index()
    {
        $pesananItems = Pesanan::all();

        return view('kantin.pesanan', compact('pesananItems'));
    }
}
