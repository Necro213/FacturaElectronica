<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TABLACFDIPRUEBAS extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('CFDI_Pruebas',function (Blueprint $table){
            $table->string('RFC',100)->nullable();
            $table->string('Razon_Social',100)->nullable();
            $table->string('Calle',60)->nullable();
            $table->string('No_Ext',100)->nullable();
            $table->string('Colonia',100)->nullable();
            $table->string('Localidad',100)->nullable();
            $table->string('Ciudad',100)->nullable();
            $table->string('Estado',100)->nullable();
            $table->string('Pais',100)->nullable();
            $table->string('CP',100)->nullable();
            $table->string('Regimen_Fiscal',100)->nullable();
            $table->string('Fiel',100)->nullable();
            $table->string('CSD',2000)->nullable();
            $table->string('No_CSD',100)->nullable();
            $table->string('Usuario',100)->nullable();
            $table->string('Pass',100)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('CFDI_Pruebas');
    }
}
