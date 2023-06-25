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
        Schema::create('penilaian_kriteria', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('paket_pariwisata_id');
            $table->unsignedBigInteger('kriteria_bobot_id');
            $table->float('penilaian_relatif');
            // ...
            $table->timestamps();

            $table->foreign('paket_pariwisata_id')->references('id')->on('paket_pariwisata');
            $table->foreign('kriteria_bobot_id')->references('id')->on('kriteria_bobot');
        });
    }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('penilaian_kriteria');
    }
};
