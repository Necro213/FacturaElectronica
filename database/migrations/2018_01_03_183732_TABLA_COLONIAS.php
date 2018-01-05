<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TABLACOLONIAS extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Colonias',function (Blueprint $table){
            $table->integer('clave_col');
            $table->string('des_col',100)->nullable();
            $table->string('des_mun',60)->nullable();

            $table->primary('clave_col');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('Colonias');
    }
}
