<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEntidadTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inetentidad', function (Blueprint $table) {
            $table->increments('entId');
            $table->string('entDoc',20)->nullable();
            $table->string('entDenom',500);
            $table->string('entDepend')->nullable();
            $table->string('entSigla')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('inetentidad');
    }
}
