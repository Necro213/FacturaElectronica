<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TABLADATOSNOTARIO extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ENTIDADFEDERATIVA',function (Blueprint $table){
           $table->char('TIPENT',2);
           $table->string('DESENT',100)->nullable();

           $table->primary('TIPENT');
        });

        Schema::create('DATOSNOTARIO',function (Blueprint $table){
            $table->char('TIPENT',2)->nullable();
            $table->string('CURP',20)->nullable();
            $table->integer('NUMNOTARIA')->nullable();
            $table->string('ADSCRIPCION')->nullable();

            $table->foreign('TIPENT')->references('TIPENT')->on('ENTIDADFEDERATIVA');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('DATOSNOTARIO');
        Schema::drop('ENTIDADFEDERATIVA');
    }
}
