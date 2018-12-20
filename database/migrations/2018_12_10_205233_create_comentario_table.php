<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateComentarioTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inetcomentario', function (Blueprint $table) {
            $table->increments('comId');
            $table->string('comDescripcion', 500)->nullable();
            $table->dateTime('comFecha');
            $table->integer('comAutor')->unsigned()->nullable();
            $table->foreign('comAutor')
                ->references('perId')
                ->on('inetpersona');

            $table->boolean('comVisible')->default(true)->nullable();
            $table->integer('comPublicacion')->unsigned()->nullable();
            $table->foreign('comPublicacion')
                ->references('pubId')
                ->on('inetpublicacion')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('inetcomentario');
    }
}
