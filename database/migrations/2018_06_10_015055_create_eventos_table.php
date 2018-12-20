<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEventosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inetevento', function (Blueprint $table) {
            $table->increments('evtId');
            $table->string('evtTitle',250);
            $table->dateTime('evtStartdate');
            $table->dateTime('evtEnddate');
            $table->boolean('evtAllday')->nullable();
            $table->boolean('evtNational')->default(0)->nullable();
            $table->boolean('evtLocal')->default(0)->nullable();
            $table->integer('evtTipo')->unsigned();
            $table->foreign('evtTipo')
                    ->references('tevId')
                    ->on('inettipoevento');
            $table->integer('evtPerson')->unsigned()->nullable();
            $table->string('evtPathIcon',500)->nullable();
            $table->string('evtRegisterBy')->nullable();
            $table->dateTime('evtRegisterAt')->nullable();
            $table->string('evtUpdatedBy')->nullable();
            $table->dateTime('evtUpdatedAt')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('inetevento');
    }
}
