<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TABLAINE extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('INE',function (Blueprint $table){
           $table->integer('CVEFOL');
           $table->string('CVESER',2);
           $table->string('TIPPRO',50);
           $table->string('IDCONTORDIN',10)->nullable();
           $table->string('TIPCOM',50)->nullable();
           $table->string('ENTIDAD',3)->nullable();
           $table->string('AMBITO',20)->nullable();
           $table->string('IDCONT',10)->nullable();

           $table->primary(['CVEFOL','CVESER','TIPPRO']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('INE');
    }
}
