<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TABLADATOSOPERACION extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('DATOSOPERACION',function (Blueprint $table){
           $table->integer('CVEFOL');
           $table->string('CVESER',2);
           $table->integer('NUMINSTRUMENTO');
           $table->dateTime('FECHANOT');
           $table->decimal('MONTOOPERACION');
           $table->decimal('SUBTOTAL');
           $table->decimal('IVA');

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
        Schema::drop('DATOSOPERACION');
    }
}
