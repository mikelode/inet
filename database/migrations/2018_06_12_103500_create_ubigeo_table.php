<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUbigeoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inetubigeo', function (Blueprint $table) {
            $table->string('ubiId', 6);
            $table->primary('ubiId');
            $table->string('ubiRegion',25);
            $table->integer('ubiRegionId');
            $table->string('ubiProvincia', 50)->nullable();
            $table->integer('ubiProvinciaId')->nullable();
            $table->string('ubiDistrito',50)->nullable();
            $table->integer('ubiDistritoId')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('inetubigeo');
    }
}
