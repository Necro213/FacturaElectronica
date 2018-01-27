<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TABLAVARIOS extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('VARIOS',function (Blueprint $table){
            $table->integer('idUsuario');
            $table->increments('idVARIOS');
            $table->boolean('ENVCORR')->nullable();
            $table->boolean('ARRENDAMIENTO')->nullable();
            $table->boolean('HONORARIOS')->nullable();
            $table->boolean('SERVPROF')->nullable();
            $table->boolean('DONATIVOS')->nullable();
            $table->string('HOSPEDAJE',2000)->nullable();
            $table->string('TEXTIVA',2000)->nullable();
            $table->string('NOAUT',2000)->nullable();
            $table->string('LEYENDA',2000)->nullable();
            $table->integer('RETIVA')->nullable();
            $table->integer('RETISR')->nullable();
            $table->integer('RETCED')->nullable();
            $table->date('FECHAAUT')->nullable();
            $table->boolean('IMPEXCEL')->nullable();
            $table->boolean('IVAPRO')->nullable();
            $table->boolean('USARTRES')->nullable();

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
        Schema::drop('VARIOS');
    }
}
