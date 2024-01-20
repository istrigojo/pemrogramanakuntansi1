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
        Schema::create('jurnal', function (Blueprint $table) {
            $table->id();
            // $table->date('tanggal_selesai'); //panggil dari transaksi->servis
            $table->unsignedBigInteger('akun_id');
            $table->unsignedBigInteger('transaksi_id');
            $table->foreign('akun_id')->references('id')->on('akun');
            $table->foreign('transaksi_id')->references('id')->on('transaksi');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jurnal');
    }
};
