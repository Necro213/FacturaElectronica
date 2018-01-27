<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TABLAEMISOR extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('EMISOR',function (Blueprint $table){
            $table->integer('idUsuario');
            $table->string('RAZSOC',100);
            $table->string('SUBTIT',100)->nullable();
            $table->integer('CP')->nullable();
            $table->string('ESTADO',100)->nullable();
            $table->string('CIUDAD',100)->nullable();
            $table->string('LOCALIDAD',100)->nullable();
            $table->string('CALLE',100)->nullable();
            $table->string('NUMINT',100)->nullable();
            $table->string('NUMEXT',20)->nullable();
            $table->string('RFC',20)->nullable();
            $table->string('PAIS',20)->nullable();
            $table->string('REGFIS',100)->nullable();
            $table->string('REGINC',100)->nullable();
            $table->string('USEX',100)->nullable();
            $table->string('PARODIF',100)->nullable();
            $table->string('LOGO',2000)->nullable();
            $table->string('TEL',250)->nullable();
            $table->string('MAIL',250)->nullable();
            $table->string('PASS',250)->nullable();

            $table->primary('RAZSOC');
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
        Schema::drop('EMISOR');
    }
}
