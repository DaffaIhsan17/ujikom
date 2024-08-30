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
            // Menambahkan kolom kantin_id dengan foreign key
            $table->foreignId('kantin_id')
                ->nullable() // Kolom ini boleh kosong
                ->constrained('kantins') // Menyambungkan ke tabel kantins
                ->onDelete('set null'); // Jika kantin dihapus, set null pada kolom ini
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('produks', function (Blueprint $table) {
            // Menghapus foreign key dan kolom kantin_id
            $table->dropForeign(['kantin_id']);
            $table->dropColumn('kantin_id');
        });
    }
};
