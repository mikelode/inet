<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDestinosviajeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inetdestinoviaje', function (Blueprint $table) {
            $table->integer('dviHojaviaje')->unsigned();
            $table->foreign('dviHojaviaje')
                    ->references('viaId')
                    ->on('inethojaviaje');

            $table->integer('dviUbigeo')->unsigned();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('inetdestinoviaje');
    }
}
