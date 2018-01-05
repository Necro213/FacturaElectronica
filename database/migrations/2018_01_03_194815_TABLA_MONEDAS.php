<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TABLAMONEDAS extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('MONEDAS',function (Blueprint $table){
            $table->string('CVEMON',3);
            $table->string('DESMON',50)->nullable();
            $table->integer('DECMON')->nullable();

            $table->primary('CVEMON');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('CVEMON');
    }
}
