<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TABLASERIEFACTURA extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('SERIEFACTURA',function (Blueprint $table){
            $table->string('CVESER',6);
            $table->string('DESSER',50)->nullable();
            $table->integer('FOLINI')->nullable();
            $table->integer('FOLFIN')->nullable();
            $table->integer('FOLACT')->nullable();
            $table->integer('idUsuario');

            $table->primary('CVESER');
            $table->foreign('idUsuario')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('SERIEFACTURA');
    }
}
