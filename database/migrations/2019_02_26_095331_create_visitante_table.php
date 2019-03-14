<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVisitanteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ctlvisitante', function (Blueprint $table) {
            $table->increments('visId');
            $table->integer('visSector')->unsigned()->nullable();
            $table->foreign('visSector')
                    ->references('sctId')
                    ->on('inetsector')
                    ->onDelete('cascade');

            $table->integer('visPersona')->unsigned();
            $table->foreign('visPersona')
                    ->references('perId')
                    ->on('inetpersona')
                    ->onDelete('cascade');

            $table->string('visFono',50)->nullable();
            $table->string('visOcupacion',100)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ctlVisitante');
    }
}
