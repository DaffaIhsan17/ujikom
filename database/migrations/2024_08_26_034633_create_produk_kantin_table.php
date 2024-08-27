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
        Schema::create('produk_kantin', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('kantin_id');
            $table->unsignedBigInteger('produk_id');
            $table->timestamps();

            // Foreign key constraints
            $table->foreign('kantin_id')->references('id')->on('kantins')->onDelete('cascade');
            $table->foreign('produk_id')->references('id')->on('produks')->onDelete('cascade');

            // Unique constraint to prevent duplicate entries
            $table->unique(['kantin_id', 'produk_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('produk_kantin');
    }
};
