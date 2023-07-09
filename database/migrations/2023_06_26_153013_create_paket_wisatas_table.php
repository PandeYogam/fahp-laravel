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
            $table->foreignId('user_id')->nullable();

            $table->string('nama');
            $table->string('slug')->unique();
            $table->text('body')->nullable();

            $table->unsignedInteger('harga');
            $table->integer('popularitas');
            $table->integer('rating');
            $table->decimal('durasi');
            $table->integer('jumlah_wisata_dikunjungi');

            $table->integer('harga_bobot')->nullable();
            $table->integer('popularitas_bobot')->nullable();
            $table->integer('rating_bobot')->nullable();
            $table->integer('durasi_bobot')->nullable();
            $table->integer('jumlah_wisata_bobot')->nullable();

            $table->text('pariwisata_yang_dikunjungi')->nullable();
            $table->text('terbilang')->nullable();
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
