<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TABLASUCURSAL extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('SUCURSAL',function (Blueprint $table){
            $table->integer('idUsuario');
            $table->increments('idSUCURSAL');
            $table->integer('CP')->nullable();
            $table->string('ESTADO',100)->nullable();
            $table->string('CIUDAD',100)->nullable();
            $table->string('LOCALIDAD',100)->nullable();
            $table->string('CALLE',100)->nullable();
            $table->string('NUMINT',100)->nullable();
            $table->string('NUMEXT',20)->nullable();
            $table->string('COLONIA',250)->nullable();

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
        Schema::drop('SUCURSAL');
    }
}
