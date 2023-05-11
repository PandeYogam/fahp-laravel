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
        Schema::create('fuzzies', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('sub_kriteria_id');
            $table->foreign('sub_kriteria_id')->references('id')->on('sub_kriterias')->onDelete('cascade');
            $table->string('nama');
            $table->float('bawah')->nullable();
            $table->float('tengah')->nullable();
            $table->float('atas')->nullable();
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
        Schema::dropIfExists('fuzzies');
    }
};
