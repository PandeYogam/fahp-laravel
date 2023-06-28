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
        Schema::create('hasil_dss', function (Blueprint $table) {
            $table->id();
            // $table->unsignedBigInteger('user_id');
            // Tambahkan kolom lainnya jika diperlukan

            $table->foreignId('user_id');
            $table->foreignId('kriteria_bobot_id');
            $table->foreignId('hasil_bobot_vektor_id');
            $table->foreignId('hasil_perangkingan_id');
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
        Schema::dropIfExists('hasil_dsses');
    }
};
