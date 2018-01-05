<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TABLADATOSADQUIRIENTES extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('DATOSADQUIRIENTES',function (Blueprint $table){
           $table->integer('NUMADQ');
           $table->integer('CVEFOL');
           $table->string('CVESER',2);
           $table->string('NOMBRE',254)->nullable();
           $table->string('APEPATERNO',254)->nullable();
           $table->string('APEMATERNO',254)->nullable();
           $table->string('RFCADQ',13)->nullable();
           $table->string('CURPADQ',20)->nullable();
           $table->decimal('PORCENTAJE')->nullable();

           $table->primary('NUMADQ');
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
        Schema::drop('DATOSADQUIRIENTES');
    }
}
