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
            $table->date('tanggal_lahir')->nullable();
            $table->string('jenis_kelamin');
            $table->text('alamat');
            $table->unsignedBigInteger('user_id');
            // $table->unsignedBigInteger('kategori_id');
            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('user');
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
