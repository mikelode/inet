<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePasajerosviajeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inetpasajeroviaje', function (Blueprint $table) {
            $table->integer('psjHojaviaje')->unsigned();
            $table->foreign('psjHojaviaje')
                    ->references('viaId')
                    ->on('inethojaviaje');

            $table->integer('psjPersona')->unsigned();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('inetpasajeroviaje');
    }
}
