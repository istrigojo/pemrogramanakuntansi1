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
        Schema::create('montirkategori', function (Blueprint $table) {
            $table->unsignedBigInteger('montir_id');
            $table->unsignedBigInteger('kategori_id');
            $table->foreign('montir_id')->references('id')->on('montir')->onDelete('cascade');
            $table->foreign('kategori_id')->references('id')->on('kategori')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('montirkategori');
    }
};
