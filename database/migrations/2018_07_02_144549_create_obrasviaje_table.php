<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateObrasviajeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inetobraviaje', function (Blueprint $table) {
            $table->integer('oviHojaviaje')->unsigned();
            $table->foreign('oviHojaviaje')
                    ->references('viaId')
                    ->on('inethojaviaje');

            $table->integer('oviObra')->unsigned();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('inetobraviaje');
    }
}
