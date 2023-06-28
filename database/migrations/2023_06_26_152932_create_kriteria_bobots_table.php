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
        Schema::create('kriteria_bobot', function (Blueprint $table) {
            $table->id();
            $table->integer('kriteria_1');
            $table->integer('kriteria_2');
            $table->integer('kriteria_3');
            $table->integer('kriteria_4');
            $table->integer('kriteria_5');
            // Tambahkan kolom kriteria lainnya jika diperlukan

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
        Schema::dropIfExists('kriteria_bobots');
    }
};
