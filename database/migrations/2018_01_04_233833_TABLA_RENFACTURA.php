<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TABLARENFACTURA extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('RENFACTURA',function (Blueprint $table){
           $table->integer('CVEFOL');
           $table->string('CVESER',2);
           $table->integer('CVEPRO');
           $table->float('CANREN')->nullable();
           $table->decimal('PREREN')->nullable();
           $table->decimal('SUBREN')->nullable();
           $table->decimal('IVAREN')->nullable();
           $table->decimal('TOTREN')->nullable();
           $table->float('PORFLE')->nullable();
           $table->longText('OBSREN',8000)->nullable();
           $table->decimal('RETREN')->nullable();
           $table->decimal('RENISR')->nullable();
           $table->decimal('RENIVAISR')->nullable();
           $table->decimal('RENCED')->nullable();
           $table->decimal('RENIEP')->nullable();
           $table->decimal('PRESUB')->nullable();
           $table->integer('NUMREN');

           $table->primary('NUMREN');
           $table->foreign('CVEPRO')->references('CVEPRO')->on('PRODUCTOS');
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
        Schema::drop('RENFACTURA');
    }
}
