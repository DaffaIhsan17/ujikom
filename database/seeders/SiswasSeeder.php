<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class SiswasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $siswa = [
            ['id' => 1, 'nama' => 'Daffa', 'nisn' => '0077723063', 'password' => Hash::make('password'), 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
        ];
        DB::table('siswas')->insert($siswa);
    }
}
