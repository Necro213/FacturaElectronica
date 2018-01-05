<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TABLADATOSENAJENANTES extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('DATOSENAJENANTES',function (Blueprint $table){
           $table->integer('NUMENA');
           $table->integer('CVEFOL');
           $table->string('CVESER',2);
           $table->string('NOMBRE',254)->nullable();
           $table->string('APEPATERNO',254)->nullable();
           $table->string('APEMATERNO',254)->nullable();
           $table->string('RFCENA',13)->nullable();
           $table->string('CURPENA',20)->nullable();
           $table->decimal('PORCENTAJE')->nullable();

           $table->primary('NUMENA');
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
        Schema::drop('DATOSENAJENANTES');
    }
}
