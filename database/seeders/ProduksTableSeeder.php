<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Produks;

class ProduksTableSeeder extends Seeder
{
    public function run()
    {
        Produks::create([
            'nama' => 'Seblak Mang Ajiril',
            'jenis'=> 'Makanan',
            'harga' => 10000,
            'foto' => 'img1.png'
        ]);

        Produks::create([
            'nama' => 'Bakmie',
            'jenis'=> 'Makanan',
            'harga' => 10000,
            'foto' => 'img2.png'
        ]);
        Produks::create([
            'nama' => 'Katsu',
            'jenis'=> 'Makanan',
            'harga' => 10000,
            'foto' => 'img3.png'
        ]);
        Produks::create([
            'nama' => 'Batagor',
            'jenis'=> 'Makanan',
            'harga' => 10000,
            'foto' => 'img4.png'
        ]);
        Produks::create([
            'nama' => 'Nasi Goreng',
            'jenis'=> 'Makanan',
            'harga' => 10000,
            'foto' => 'img5.png'
        ]);

        // Add more products as needed
    }
}
