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
        Schema::table('keranjang', function (Blueprint $table) {
            // Menambahkan kolom 'pemesan' dengan tipe string
            $table->string('pemesan')->after('kantin_id'); // Ganti 'kolom_terakhir' dengan nama kolom terakhir di tabel keranjang
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('keranjang', function (Blueprint $table) {
            // Menghapus kolom 'pemesan'
            $table->dropColumn('pemesan');
        });
    }
};
