<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('produks', function (Blueprint $table) {
            // Menambahkan kolom 'trending' dengan tipe boolean, default value false
            $table->boolean('trending')->default(false)->after('kantin_id'); // Ganti 'kolom_terakhir' dengan kolom yang terakhir ada di tabel anda
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('produks', function (Blueprint $table) {
            // Menghapus kolom 'trending'
            $table->dropColumn('trending');
        });
    }
};
