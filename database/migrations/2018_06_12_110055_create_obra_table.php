<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateObraTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inetobra', function (Blueprint $table) {
            $table->increments('obrId');
            $table->string('obrCode', 15)->nullable();
            $table->string('obrName', 1000);
            $table->string('obrShortname', 1000);
            $table->integer('obrYear');
            $table->string('obrSecfun')->nullable();
            $table->string('obrFunc')->nullable();
            $table->string('obrDiv')->nullable();
            $table->string('obrGrup')->nullable();
            $table->string('obrUbigeo',6)->nullable();
            $table->foreign('obrUbigeo')
                    ->references('ubiId')
                    ->on('inetubigeo');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('inetobra');
    }
}
