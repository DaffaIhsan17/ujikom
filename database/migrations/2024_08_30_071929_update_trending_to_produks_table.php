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
            // Mengubah kolom 'trending' menjadi nullable
            $table->boolean('trending')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('produks', function (Blueprint $table) {
            // Mengubah kolom 'trending' kembali menjadi non-nullable (default value masih false)
            $table->boolean('trending')->nullable(false)->default(false)->change();
        });
    }
};
