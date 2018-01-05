<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TABLATIPOINMUEBLE extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('TIPOINMUEBLE',function (Blueprint $table){
           $table->char('TIPINM',2);
           $table->string('DESINM',100)->nullable();

           $table->primary('TIPINM');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('TIPOINMUEBLE');
    }
}
