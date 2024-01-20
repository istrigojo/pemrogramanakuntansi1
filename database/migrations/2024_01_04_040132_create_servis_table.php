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
            $table->string('no_trans'); //
            $table->boolean('status', [0, 1])->default(0); //0=proses, 1=selesai  //
            $table->date('tanggal_masuk'); //
            $table->date('tanggal_selesai'); //YET
            $table->double('total_servis');
            $table->unsignedBigInteger('customer_id'); //
            $table->unsignedBigInteger('user_id'); //
            $table->unsignedBigInteger('kategori_id'); //
            $table->unsignedBigInteger('montir_id'); //YETdimasukkan saat apa?
            $table->unsignedBigInteger('produk_id');
            $table->timestamps();
            $table->foreign('customer_id')->references('id')->on('customer');
            $table->foreign('user_id')->references('id')->on('user');
            $table->foreign('kategori_id')->references('id')->on('kategori');
            $table->foreign('montir_id')->references('id')->on('montir');
            $table->foreign('produk_id')->references('id')->on('produk');
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
