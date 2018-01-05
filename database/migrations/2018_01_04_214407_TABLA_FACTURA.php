<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TABLAFACTURA extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('FACTURA',function (Blueprint $table){
           $table->integer('CVEFOL');
           $table->string('CVESER',2);
           $table->integer('CVECLI')->nullable();
           $table->dateTime('FECFAC')->nullable();
           $table->char('CONFAC',20)->nullable();
           $table->string('METFAC',100)->nullable();
           $table->string('TERFAC',50)->nullable();
           $table->decimal('SEBFAC')->nullable();
           $table->decimal('IVAFAC')->nullable();
           $table->decimal('TOTFAC')->nullable();
           $table->char('STSFAC',1)->nullable();
           $table->string('TIMFAC',100)->nullable();
           $table->binary('CBBFAC')->nullable();
           $table->string('SECFDFAC',500)->nullable();
           $table->string('SESATFAC',500)->nullable();
           $table->string('CESATFAC',1000)->nullable();
           $table->string('FESATFAC',100)->nullable();
           $table->char('STSEMA',1)->nullable();
           $table->decimal('TOTRET')->nullable();
           $table->decimal('TOTISR')->nullable();
           $table->decimal('TOTIVAISR')->nullable();
           $table->decimal('TOTCED')->nullable();
           $table->decimal('TOTIEP')->nullable();
           $table->integer('CVECLIDES')->nullable();
           $table->char('STSFLE',1)->nullable();
           $table->char('TIPFAC',1)->nullable();
           $table->string('TIMCAN',100)->nullable();
           $table->string('STSUUID',100)->nullable();
           $table->string('FECCAN',100)->nullable();
           $table->string('OBSCAN',1000)->nullable();
           $table->string('ACUCAN',2000)->nullable();
           $table->string('MONEDA',50)->nullable();
           $table->string('TIPCAN',20)->nullable();
           $table->string('TEXADI',2000)->nullable();
           $table->char('METPAG',3)->nullable();
           $table->string('VERSION',10)->nullable();
           $table->string('FORPAG',2)->nullable();
           $table->string('CVOMON',3)->nullable();
           $table->string('TIPOCAMBIO',10)->nullable();
           $table->string('CVEUSO',3)->nullable();

           $table->primary(['CVEFOL','CVESER']);
           $table->foreign('CVECLI')->references('CVECLI')->on('CLIENTES');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('FACTURA');
    }
}
