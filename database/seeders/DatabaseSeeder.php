<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Panggil seeder lainnya
        $this->call(KantinsSeeder::class);
        $this->call(ProduksSeeder::class);
        $this->call(RolesSeeder::class);
        $this->call(SiswasSeeder::class);
        $this->call(UsersSeeder::class);
        $this->call(ModelHasRolesSeeder::class);
    }
}
