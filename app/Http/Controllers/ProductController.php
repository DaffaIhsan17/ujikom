<?php

namespace App\Http\Controllers;

use App\Models\Produks;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    // Dashboard method
    public function dashboard()
    {
        // Mocking trending and selected menu items
        $trendingMenu = Produks::all();
        $selectedMenu = Produks::all();

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
        $cartItems = [
            (object)[ 'id' => 6, 'nama' => 'Seblak Mang Ajril', 'harga' => 10000, 'foto' => 'img1.png', 'spiciness' => 1 ],
            (object)[ 'id' => 7, 'nama' => 'Nasi Goreng', 'harga' => 10000, 'foto' => 'img2.png', 'spiciness' => 1 ],
            (object)[ 'id' => 8, 'nama' => 'Katsu', 'harga' => 10000, 'foto' => 'img3.png', 'spiciness' => 1 ],
        ];

        return view('kantin.keranjang', compact('cartItems'));
    }

    // Product detail page
    public function detail($id)
    {
        $product = Produks::findOrFail($id); // Find the product by its ID or fail
    
        return view('kantin.detail', compact('product'));
    }
    
}
