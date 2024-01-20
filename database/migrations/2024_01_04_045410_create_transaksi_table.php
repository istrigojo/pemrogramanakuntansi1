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
            $table->string('metode_bayar'); //metode bayar==tunai/kartu debit/kartu kredit/tf antar bank with select aja deh          uang muka==masukin uang mukanya berapa\belum bayar alias bayar nanti 
            $table->double('total_bayar'); //total uang yang dibayarkan oleh customer //BILA customer menginput nominal bayar <totalservis maka tetap akan dicatat tapi membentuk akun piutang jika luas ya hanya kas masuk dan pendapatan servis serta mengkredit akun persediaan juga
            // $table->double('total_servis');
            // $table->double('tanggal_selesai');
            $table->boolean('status', [0, 1])->default(0); //0=proses, 1=selesai
            $table->unsignedBigInteger('servis_id'); //ambil no trans, cust, servisnya apa, harga jasa servis n produk, total, serta metode bayar
            $table->foreign('servis_id')->references('id')->on('servis');
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
