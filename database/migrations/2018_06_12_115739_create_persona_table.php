<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePersonaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inetpersona', function (Blueprint $table) {
            $table->increments('perId');
            $table->string('perDni',10)->nullable();
            $table->string('perNombre');
            $table->string('perPaterno')->nullable();
            $table->string('perMaterno');
            $table->string('perFullName',600);
            $table->date('perNacimiento')->nullable();
            $table->integer('perCareer')->unsigned()->nullable();
            $table->foreign('perCareer')
                    ->references('ocuId')
                    ->on('inetocupacion');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('inetpersona');
    }
}
