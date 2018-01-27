<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TABLACONFGEN extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('CONFGEN',function (Blueprint $table){
            $table->integer('idUsuario');
            $table->increments('id');
            $table->boolean('ANEXARAXML')->nullable();
            $table->boolean('UTILIZARREM')->nullable();

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
        Schema::drop('CONFGEN');
    }
}
