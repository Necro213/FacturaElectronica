<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TABLACONTAFACTURASREN extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('CONTA_FACTURASREN',function (Blueprint $table){
           $table->integer('RENGLON');
           $table->string('UUID',36);
           $table->decimal('IMPORTE');
           $table->string('TASA',50);
           $table->string('IMPUESTO',50)->nullable();

           $table->primary('RENGLON');
           $table->foreign('UUID')->references('UUID')->on('CONTA_FACTURAS');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('CONTA_FACTURASREN');
    }
}
