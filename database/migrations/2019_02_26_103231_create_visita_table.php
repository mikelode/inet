<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVisitaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ctlVisita', function (Blueprint $table) {
            $table->increments('vtaId');
            $table->integer('vtaVisitante')->unsigned();
            $table->foreign('vtaVisitante')
                    ->references('visId')
                    ->on('ctlVisitante')
                    ->onDelete('cascade');

            $table->date('vtaPrimera');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ctlVisita');
    }
}
