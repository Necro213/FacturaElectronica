<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TABLAFORMASDEPAGOSAT extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('FORMASDEPAGOSAT',function (Blueprint $table){
           $table->string('FORPAG',2);
           $table->string('DESFOR',250)->nullable();

           $table->primary('FORPAG');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
