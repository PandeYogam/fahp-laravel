<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('paket_wisata', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('slug')->unique();
            $table->foreignId('user_id');
            $table->unsignedInteger('harga');
            $table->integer('popularitas');
            $table->integer('rating');
            $table->string('durasi');
            $table->text('deskripsi')->nullable();
            $table->integer('jumlah_wisata_dikunjungi');

            // Kolom untuk menyimpan wisata yang dikunjungi
            // $table->json('wisata_dikunjungi');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('paket_wisatas');
    }
};
