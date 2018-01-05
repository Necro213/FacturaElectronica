<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TABLAIEPS extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('IEPS',function (Blueprint $table){
           $table->integer('CVEIEP');
           $table->string('DESIEP',30)->nullable();
           $table->decimal('VALIEP')->nullable();
           $table->string('TIPFAC',25)->nullable();

           $table->primary('CVEIEP');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('IEPS');
    }
}
