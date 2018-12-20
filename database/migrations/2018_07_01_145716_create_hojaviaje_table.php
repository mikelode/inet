<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHojaviajeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inethojaviaje', function (Blueprint $table) {
            $table->increments('viaId');
            $table->integer('viaTitular')->unsigned();
            $table->integer('viaEntity')->unsigned();
            $table->string('viaPlace')->nullable();
            $table->string('viaMotivo',1000)->nullable();
            $table->string('viaObra')->nullable();
            $table->date('viaStartdate')->nullable();
            $table->time('viaStarttime')->nullable();
            $table->date('viaReturndate')->nullable();
            $table->time('viaReturntime')->nullable();
            $table->string('viaAdelviatico')->nullable();
            $table->string('viaComponente')->nullable();
            $table->string('viaMeta')->nullable();
            $table->string('viaModotransporte')->nullable();
            $table->integer('viaChofer')->unsigned();
            $table->integer('viaMovilidad')->unsigned();
            $table->foreign('viaMovilidad')
                    ->references('trnId')
                    ->on('inettransporte');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('inethojaviaje');
    }
}
