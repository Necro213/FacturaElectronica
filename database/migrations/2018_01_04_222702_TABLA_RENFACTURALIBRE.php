<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TABLARENFACTURALIBRE extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('RENFACTURALIBRE',function (Blueprint $table){
           $table->integer('CVEFOL');
           $table->string('CVESER',2);
           $table->integer('CVEREN');
           $table->string('CANLIB',500)->nullable();
           $table->string('UNILIB',500)->nullable();
           $table->string('DESLIB',500)->nullable();
           $table->string('PRELIB',500)->nullable();
           $table->string('IMPLIB',500)->nullable();

           $table->primary('CVEREN');
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
        Schema::drop('RENFACTURALIBRE');
    }
}
