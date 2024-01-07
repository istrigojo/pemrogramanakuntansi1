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
        Schema::create('montir', function (Blueprint $table) {
            $table->id();
            $table->string('nama_montir');
            $table->string('email')->unique();
            $table->string('no_hp')->nullable();
            $table->date('tanggal_lahir')->nullable();
            $table->string('jenis_kelamin');
            $table->text('alamat')->nullable();
            $table->string('img_montir')->nullable();
            $table->unsignedBigInteger('kategori_id')->nullable();
            $table->timestamps();
            $table->foreign('kategori_id')->references('id')->on('kategori');
            // $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('montir');
    }
};
