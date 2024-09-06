<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $akun = [
            ['id' => '1', 'name' => 'Admin', 'email' => 'admin@example.com', 'email_verified_at' => Carbon::now(), 'password' => Hash::make('password'), 'role' => 'Admin', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now(), 'kantin_id' => null],
            ['id' => '3', 'name' => 'Aqua', 'email' => 'aqua@gmail.com', 'email_verified_at' => Carbon::now(), 'password' => Hash::make('password'), 'role' => 'Kantin', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now(), 'kantin_id' => 1],
            ['id' => '4', 'name' => 'Koko', 'email' => 'mangkoko@gmail.com', 'email_verified_at' => Carbon::now(), 'password' => Hash::make('password'), 'role' => 'Kantin', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now(), 'kantin_id' => 2],
        ];
        DB::table('users')->insert($akun);
    }
}
