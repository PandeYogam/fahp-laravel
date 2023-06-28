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
        Schema::create('hasil_bobot_vektor', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('kriteria_1');
            $table->unsignedBigInteger('kriteria_2');
            $table->unsignedBigInteger('kriteria_3');
            $table->unsignedBigInteger('kriteria_4');
            $table->unsignedBigInteger('kriteria_5');
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
        Schema::dropIfExists('hasil_bobot_vektors');
    }
};
