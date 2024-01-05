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
        Schema::create('transaksi', function (Blueprint $table) {
            $table->id();
            $table->string('metode_bayar');
            $table->boolean('status', [0, 1])->default(0); //0=proses, 1=selesai
            $table->unsignedBigInteger('servis_id');
            $table->unsignedBigInteger('akun_id');
            $table->foreign('servis_id')->references('id')->on('servis');
            $table->foreign('akun_id')->references('id')->on('akun');
            // $table->double('total_servis');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transaksi');
    }
};
