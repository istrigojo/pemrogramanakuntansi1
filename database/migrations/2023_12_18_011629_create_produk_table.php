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
        Schema::create('produk', function (Blueprint $table) {
            $table->id();
            // $table->boolean('status');
            $table->string('img_produk')->nullable();
            $table->string('nama_produk');
            $table->text('detail');
            $table->string('merk');
            $table->string('stok', 2)->nullable();
            $table->double('harga');
            $table->timestamp('tanggal_masuk')->nullable();
            $table->timestamp('tanggal_keluar')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('produk');
    }
};
