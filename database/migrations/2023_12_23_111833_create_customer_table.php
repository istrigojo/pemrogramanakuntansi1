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
        Schema::create('customer', function (Blueprint $table) {
            $table->id();
            $table->string('nama_customer');
            $table->string('email');
            $table->string('no_hp');
            $table->string('jenis_kelamin');
            $table->text('alamat');
            $table->unsignedBigInteger('mobil_id')->nullable();
            $table->timestamps();
            $table->foreign('mobil_id')->references('id')->on('mobil');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('customer');
    }
};
