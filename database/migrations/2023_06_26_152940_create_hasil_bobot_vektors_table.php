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
            $table->decimal('kriteria_1', 18, 14);
            $table->decimal('kriteria_2', 18, 14);
            $table->decimal('kriteria_3', 18, 14);
            $table->decimal('kriteria_4', 18, 14);
            $table->decimal('kriteria_5', 18, 14);
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
