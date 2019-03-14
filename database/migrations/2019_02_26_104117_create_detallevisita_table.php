<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDetallevisitaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ctlDetvisita', function (Blueprint $table) {
            $table->increments('dvtId');
            $table->date('dvtFecha');
            $table->string('dvtDesc',1000);
            $table->integer('dvtVisita')->unsigned();
            $table->foreign('dvtVisita')
                    ->references('vtaId')
                    ->on('ctlVisita')
                    ->onDelete('cascade');
            $table->string('dvtNota',500)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ctlDetvisita');
    }
}
