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
        Schema::create('servis', function (Blueprint $table) {
            $table->id();
            $table->boolean('status');
            // $table->unsignedBigInteger('customer_id');
            // // $table->unsignedBigInteger('mobil_id');
            // $table->unsignedBigInteger('user_id');
            // // $table->unsignedBigInteger('kategori_id');
            // $table->unsignedBigInteger('montir_id');
            // $table->unsignedBigInteger('produk_id');
            // $table->timestamps();
            // $table->foreign('customer_id')->references('id')->on('customer');
            // // $table->foreign('mobil_id')->references('id')->on('mobil');
            // $table->foreign('user_id')->references('id')->on('user');
            // $table->foreign('kategori_id')->references('id')->on('kategori');
            // $table->foreign('montir_id')->references('id')->on('montir');
            // $table->foreign('produk_id')->references('id')->on('produk');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('servis');
    }
};
