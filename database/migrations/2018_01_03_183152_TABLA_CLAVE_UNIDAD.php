<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TABLACLAVEUNIDAD extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Clave_Unidad',function (Blueprint $table){
           $table->string('clave_unidad',3);
           $table->string('nom_uni',250)->nullable();
           $table->string('des_uni',1000)->nullable();

           $table->primary('clave_unidad');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('Clave_Unidad');
    }
}
