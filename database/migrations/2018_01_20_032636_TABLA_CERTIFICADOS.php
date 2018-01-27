<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TABLACERTIFICADOS extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('CERTIFICADOS',function (Blueprint $table){
            $table->integer('idUsuario');
            $table->increments('idCERTIFICADOS');
            $table->string('CERDIGKEY',2000)->nullable();
            $table->string('CERDIGCER',2000)->nullable();
            $table->string('CERDIGNUM',2000)->nullable();
            $table->string('ARCHIVOKEY',2000)->nullable();
            $table->string('ARCHIVOCER',2000)->nullable();
            $table->string('CLAVE',2000)->nullable();
            $table->string('COMENTARIO',2000)->nullable();

            $table->foreign('idUsuario')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('CERTIFICADOS');
    }
}
