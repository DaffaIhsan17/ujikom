<?php

namespace App\Http\Controllers;

use App\Models\Produks;
use App\Models\Keranjang;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    // Dashboard method
    public function dashboard()
    {
        // Mocking trending and selected menu items
        $trendingMenu = Produks::where('trending', true)->take(5)->get();
        $selectedMenu = Produks::where('trending', false)->get();

        return view('kantin.dashboard', compact('trendingMenu', 'selectedMenu'));
    }

    // Kantin 1 method
    public function kantin1()
    {
        $trendingMenu = Produks::all();
        $selectedMenu = Produks::all();

        return view('kantin.kantin1', compact('trendingMenu', 'selectedMenu'));
    }

    // Kantin 2 method
    public function kantin2()
    {
        $trendingMenu = Produks::all();
        $selectedMenu = Produks::all();


        return view('kantin.kantin2', compact('trendingMenu', 'selectedMenu'));
    }

    // Cart (Keranjang) method
    public function keranjang()
    {
        $cartItems = Keranjang::all();

        return view('kantin.keranjang', compact('cartItems'));
    }

    public function addToKeranjang(Request $request)
    {
        $request->validate([
            'nama' => 'required|string',
            'harga' => 'required|integer',
            'foto' => 'required|string',
            'jumlah' => 'required|integer|min:1',
            'level' => 'required|string',
        ]);
        $pemesan = auth('siswa')->user()->nama;

        Keranjang::create([
            'nama' => $request->nama,
            'harga' => $request->harga,
            'foto' => $request->foto,
            'jumlah' => $request->jumlah,
            'level' => $request->level,
            'kantin_id' => $request->kantin_id,
            'pemesan' => $pemesan,
        ]);

        return redirect()->route('keranjang')->with('success', 'Item ditambahkan ke keranjang.');
    }

    public function updateQuantity(Request $request, $id)
    {
        $item = Keranjang::findOrFail($id);
        $item->jumlah = $request->input('jumlah');
        $item->save();

        return response()->json(['success' => 'Jumlah item berhasil diupdate']);
    }

    // Product detail page
    public function detail($id)
    {
        $product = Produks::findOrFail($id); // Find the product by its ID or fail
    
        return view('kantin.detail', compact('product'));
    }
    
}
