<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TABLAUNIMED extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('UNIMED',function (Blueprint $table){
            $table->integer('CVEUNI');
            $table->string('NOMUNI',30)->nullable();
            $table->string('CVEUNISAT',3)->nullable();
            $table->integer('idUsuario');

            $table->foreign('idUsuario')->references('id')->on('users');
            $table->primary('CVEUNI');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('UNIMED');
    }
}
