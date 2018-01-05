<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TABLADESCINMUEBLES extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('DESCINMUEBLES',function (Blueprint $table){
            $table->char('CVEPAI',3)->nullable();
            $table->char('TIPENT',2)->nullable();
            $table->integer('CVEFOL');
            $table->string('CVESER',2);
            $table->char('TIPINM',2)->nullable();
            $table->string('CALLE',150)->nullable();
            $table->string('NOEXTERIOR',55)->nullable();
            $table->string('NOINTERIOR',55)->nullable();
            $table->string('COLONIA',100)->nullable();
            $table->string('LOCALIDAD',100)->nullable();
            $table->string('REFERENCIA',100)->nullable();
            $table->string('MUNICIPIO',100)->nullable();
            $table->string('CODIGOPOSTAL',5)->nullable();

            $table->foreign('CVEPAI')->references('CVEPAI')->on('PAISES');
            $table->foreign('TIPENT')->references('TIPENT')->on('ENTIDADFEDERATIVA');
            $table->foreign(['CVEFOL','CVESER'])->references(['CVEFOL','CVESER'])->on('FACTURA');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('DESCINMUEBLES');
    }
}
