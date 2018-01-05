<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TABLARENFACTURACON extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('RENFACTURACON',function (Blueprint $table){
           $table->integer('CVEFOL');
           $table->string('CVESER',2);
           $table->integer('FOLVTA');
           $table->integer('FOLREN');
           $table->integer('CLAPRO');
           $table->string('DESPRO',100);
           $table->string('UNIMED',40);
           $table->float('CANREN');
           $table->decimal('PREREN');
           $table->decimal('IMPREN');
           $table->decimal('TOTREN');

           $table->primary(['FOLVTA','FOLREN']);
           $table->foreign(['CVEFOL','CVESER'])->references(['CVEFOL','CVESER'])->on('FACTURA');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('RENFACTURACON');
    }
}
