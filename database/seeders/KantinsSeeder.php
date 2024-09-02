<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class KantinsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $kantins =[
             ['id' => 1, 'nama' => 'Aqua', 'pemilik' => 'Aqua', 'kategori' => 'Makanan & Minuman', 'img' => 'kantin/aqua.png'],
             ['id' => 2, 'nama' => 'Mang Koko', 'pemilik' => 'Koko', 'kategori' => 'Makanan & Minuman', 'img' => 'kantin/mangkoko.png'],
        ];

        DB::table('kantins')->insert($kantins);
    }
}
