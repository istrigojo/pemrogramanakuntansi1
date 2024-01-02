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
        Schema::create('berita', function (Blueprint $table) {
            $table->id();
            $table->enum('status', [0, 1])->default(0); //0=blok, 1=public
            $table->timestamp('tanggal');
            $table->string('judul');
            $table->text('detail');
            $table->string('img_berita')->nullable();
            $table->unsignedBigInteger('kategories_id');
            $table->unsignedBigInteger('user_id');
            $table->timestamps();
            $table->foreign('kategories_id')->references('id')->on('kategories');
            $table->foreign('user_id')->references('id')->on('user');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('berita');
    }
};
