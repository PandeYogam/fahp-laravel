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
        Schema::create('skor_fuzzy', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('paket_pariwisata_id');
            $table->float('kriteria1');
            $table->float('kriteria2');
            $table->float('kriteria3');
            $table->float('kriteria4');
            $table->float('kriteria5');

            $table->float('skor_total_fuzzy');
            // ...
            $table->timestamps();

            $table->foreign('paket_pariwisata_id')->references('id')->on('paket_pariwisata');
        });
    }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('skor_fuzzy');
    }
};
