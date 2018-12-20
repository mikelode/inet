<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePublicacionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inetpublicacion', function (Blueprint $table) {
            $table->increments('pubId');
            $table->string('pubTitulo', 250);
            $table->string('pubDescripcion', 2500);
            $table->string('pubPathfile', 500)->nullable();
            $table->dateTime('pubFecha');
            $table->integer('pubAutor')->unsigned()->nullable();
            $table->foreign('pubAutor')
                ->references('perId')
                ->on('inetpersona');

            $table->boolean('pubVisible')->default(true)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('inetpublicacion');
    }
}
