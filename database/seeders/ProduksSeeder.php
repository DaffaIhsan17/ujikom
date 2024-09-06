<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ProduksSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $produk = [
            ['id' => '1', 'nama' => 'Seblak', 'jenis' => 'Makanan', 'harga' => '7000', 'foto' => 'produk/img1.png', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now(), 'kantin_id' => '2', 'trending' => true, 'stok' => 100],
            ['id' => '2', 'nama' => 'Bakmie', 'jenis' => 'Makanan', 'harga' => '10000', 'foto' => 'produk/img2.png', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now(), 'kantin_id' => '2', 'trending' => true, 'stok' => 100],
            ['id' => '3', 'nama' => 'Katsu', 'jenis' => 'Makanan', 'harga' => '12000', 'foto' => 'produk/img3.png', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now(), 'kantin_id' => '2', 'trending' => true, 'stok' => 100],
            ['id' => '4', 'nama' => 'Batagor', 'jenis' => 'Makanan', 'harga' => '7000', 'foto' => 'produk/img4.png', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now(), 'kantin_id' => '2', 'trending' => true, 'stok' => 100],
            ['id' => '5', 'nama' => 'Nasi Goreng', 'jenis' => 'Makanan', 'harga' => '10000', 'foto' => 'produk/img5.png', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now(), 'kantin_id' => '2', 'trending' => false, 'stok' => 100],
            ['id' => '6', 'nama' => 'Milk Shake', 'jenis' => 'Minuman', 'harga' => '7000', 'foto' => 'produk/img6.png', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now(), 'kantin_id' => '1', 'trending' => true, 'stok' => 100],
            ['id' => '7', 'nama' => 'Pop Ice', 'jenis' => 'Minuman', 'harga' => '5000', 'foto' => 'produk/img7.png', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now(), 'kantin_id' => '1', 'trending' => false, 'stok' => 100],
            ['id' => '8', 'nama' => 'Tareng', 'jenis' => 'Makanan', 'harga' => '5000', 'foto' => 'produk/img8.png', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now(), 'kantin_id' => '1', 'trending' => false, 'stok' => 100],
            ['id' => '9', 'nama' => 'Chicken Crispy', 'jenis' => 'Makanan', 'harga' => '7500', 'foto' => 'produk/img9.png', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now(), 'kantin_id' => '1', 'trending' => false, 'stok' => 100],
            ['id' => '10', 'nama' => 'Basreng', 'jenis' => 'Makanan', 'harga' => '5000', 'foto' => 'produk/img10.png', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now(), 'kantin_id' => '1', 'trending' => false, 'stok' => 100],
            ['id' => '11', 'nama' => 'Paket Ayam', 'jenis' => 'Makanan', 'harga' => '12000', 'foto' => 'produk/img11.png', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now(), 'kantin_id' => '1', 'trending' => false, 'stok' => 100],
            ['id' => '12', 'nama' => 'Mie Ayam', 'jenis' => 'Makanan', 'harga' => '8000', 'foto' => 'produk/img12.png', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now(), 'kantin_id' => '2', 'trending' => false, 'stok' => 100],
            ['id' => '13', 'nama' => 'Udon', 'jenis' => 'Makanan', 'harga' => '7000', 'foto' => 'produk/img13.png', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now(), 'kantin_id' => '1', 'trending' => false, 'stok' => 100],
        ];
        DB::table('produks')->insert($produk);
    }
}
