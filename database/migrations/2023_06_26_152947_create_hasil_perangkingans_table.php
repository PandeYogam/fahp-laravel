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
        Schema::create('hasil_perangkingan', function (Blueprint $table) {
            $table->id();
            $table->double('nilai_perangkingan');
            // Tambahkan kolom lainnya jika diperlukan

            $table->foreignId('paket_wisata_id');
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
        Schema::dropIfExists('hasil_perangkingans');
    }
};
