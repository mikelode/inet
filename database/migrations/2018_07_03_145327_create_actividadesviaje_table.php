<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateActividadesviajeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inetactividadviaje', function (Blueprint $table) {
            $table->integer('actHojaviaje')->unsigned();
            $table->foreign('actHojaviaje')
                    ->references('viaId')
                    ->on('inethojaviaje');

            $table->date('actStartdate');
            $table->date('actEnddate');
            $table->string('actDescripcion',1000);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('inetactividadviaje');
    }
}
