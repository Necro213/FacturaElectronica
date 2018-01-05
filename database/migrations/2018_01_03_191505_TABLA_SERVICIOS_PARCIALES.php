<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TABLASERVICIOSPARCIALES extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('SERVICIOSPARCIALES',function (Blueprint $table){
            $table->integer('CVEFOL');
            $table->string('CVESER',2);
            $table->string('PERMISO',40);
            $table->string('CALLE',150)->nullable();
            $table->string('NUMEROEXTERIOR',55)->nullable();
            $table->string('NUMEROINTERIOR',55)->nullable();
            $table->string('COLONIA',100)->nullable();
            $table->string('LOCALIDAD',100)->nullable();
            $table->string('REFERENCIA',100)->nullable();
            $table->string('MUNICIPIO',100)->nullable();
            $table->char('TIPENT',2);
            $table->string('CODIGOPOS',5)->nullable();

            $table->primary(['CVEFOL','CVESER','PERMISO']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('SERVICIOSPARCIALES');
    }
}
