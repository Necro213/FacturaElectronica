<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TABLAREGIMENFISCAL extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('REGIMENFISCAL',function (Blueprint $table){
           $table->string('CVEREG',3);
           $table->string('DESREG',250)->nullable();
           $table->char('STSFIS',2)->nullable();
           $table->char('STSMOR',2)->nullable();

           $table->primary('CVEREG');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::create('REGIMENFISCAL');
    }
}
