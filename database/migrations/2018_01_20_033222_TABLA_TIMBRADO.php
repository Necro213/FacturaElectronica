<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TABLATIMBRADO extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('TIMBRADO',function (Blueprint $table){
            $table->integer('idUsuario');
            $table->increments('idTIMBRADO');
            $table->boolean('WERSERPRU')->nullable();
            $table->string('USER',2000)->nullable();
            $table->string('PASS',2000)->nullable();
            $table->boolean('WEBSERONL')->nullable();
            $table->string('PASSONL',2000)->nullable();
            $table->string('USERONL',2000)->nullable();

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
        Schema::drop('TIMBRADO');
    }
}
