<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TABLANOTARIO extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('NOTARIO',function (Blueprint $table){
            $table->integer('idUsuario');
            $table->increments('id');
            $table->integer('ENTIDADFED')->nullable();
            $table->string('CURP',2000)->nullable();
            $table->integer('NUMNOT')->nullable();
            $table->string('ADSCRIPCION',2000)->nullable();

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
        Schema::drop('NOTARIO');
    }
}
