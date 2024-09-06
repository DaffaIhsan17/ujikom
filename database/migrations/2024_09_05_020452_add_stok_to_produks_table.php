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
            $table->integer('stok')->after('kantin_id')->default(0);
        });
        Schema::table('keranjang', function (Blueprint $table) {
            $table->integer('stok')->after('kantin_id')->default(0);
        });
        Schema::table('pesanan', function (Blueprint $table) {
            $table->integer('stok')->after('kantin_id')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('produks', function (Blueprint $table) {
            $table->dropColumn('stok');
        });
        Schema::table('keranjang', function (Blueprint $table) {
            $table->dropColumn('stok');
        });
        Schema::table('pesanan', function (Blueprint $table) {
            $table->dropColumn('stok');
        });
        
    }
};
