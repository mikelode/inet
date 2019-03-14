<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSectorTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inetsector', function (Blueprint $table) {
            $table->increments('sctId');
            $table->string('sctDepartamento',20)->nullable();
            $table->string('sctProvincia',30)->nullable();
            $table->string('sctDistrito',30)->nullable();
            $table->string('sctSector',50)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('inetSector');
    }
}
