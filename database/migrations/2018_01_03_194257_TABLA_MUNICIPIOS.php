<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TABLAMUNICIPIOS extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('MUNICIPIOS',function (Blueprint $table){
            $table->integer('CVEMUN');
            $table->string('DESMUN',60)->nullable();
            $table->string('DESEDO',60)->nullable();

            $table->primary('CVEMUN');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('MUNICIPIOS');
    }
}
