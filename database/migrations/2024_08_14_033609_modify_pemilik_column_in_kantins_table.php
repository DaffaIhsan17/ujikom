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
        Schema::table('kantins', function (Blueprint $table) {
            $table->string('img')->nullable()->change();
            $table->string('pemilik')->nullable()->change();
            $table->string('nama')->nullable()->change();
            

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('kantins', function (Blueprint $table) {
            //
        });
    }
};
