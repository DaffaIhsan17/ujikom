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
        Schema::table('pesanan', function (Blueprint $table) {
            // Menambahkan kolom 'pemesan' dengan tipe string
            $table->string('pemesan')->default('Unknown')->after('kantin_id'); // Ganti 'kolom_terakhir' dengan nama kolom terakhir di tabel pesanan
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('pesanan', function (Blueprint $table) {
            // Menghapus kolom 'pemesan'
            $table->dropColumn('pemesan');
        });
    }
};
