<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTransporteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inettransporte', function (Blueprint $table) {
            $table->increments('trnId');
            $table->string('trnPlaca',10)->nullable();
            $table->string('trnTipo',50)->nullable();
            $table->string('trnMarca',250)->nullable();
            $table->integer('trnChofer')->unsigned()->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('inettransporte');
    }
}
