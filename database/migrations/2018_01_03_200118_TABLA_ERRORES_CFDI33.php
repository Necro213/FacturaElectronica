<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TABLAERRORESCFDI33 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ERRORESCFDI33',function (Blueprint $table){
           $table->string('CLAVE',10);
           $table->string('ATRIBUTO',500)->nullable();
           $table->string('REGLA',500)->nullable();
           $table->string('ERROR',500)->nullable();

           $table->primary('CLAVE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('ERRORESCFDI33');
    }
}
