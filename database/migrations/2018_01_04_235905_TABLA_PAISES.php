<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TABLAPAISES extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('PAISES',function (Blueprint $table){
            $table->char('CVEPAI',3);
            $table->string('DESPAI',200)->nullable();

            $table->primary('CVEPAI');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('PAISES');
    }
}
