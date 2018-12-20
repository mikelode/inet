<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDirectorioTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inetdirectorio', function (Blueprint $table) {
            $table->increments('dirId');
            $table->integer('dirPersona')->unsigned()->nullable();
            $table->foreign('dirPersona')
                    ->references('perId')
                    ->on('inetpersona');

            $table->string('dirCargo')->nullable();
            $table->string('dirDirecLegal',1000)->nullable();
            $table->string('dirDirecEjec',1000)->nullable();
            $table->string('dirDirElect',1000)->nullable();
            $table->string('dirTelefono',500)->nullable();
            $table->integer('dirEntidad')->unsigned()->nullable();
            $table->foreign('dirEntidad')
                    ->references('entId')
                    ->on('inetentidad');

            $table->integer('dirObra')->unsigned()->nullable();
            $table->foreign('dirObra')
                    ->references('obrId')
                    ->on('inetobra');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('inetdirectorio');
    }
}
