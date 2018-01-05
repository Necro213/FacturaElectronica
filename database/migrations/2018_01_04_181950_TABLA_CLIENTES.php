<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TABLACLIENTES extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('CLIENTES',function (Blueprint $table){
           $table->integer('CVECLI');
           $table->string('DESCLI',100)->nullable();
           $table->string('RAZCLI',100)->nullable();
           $table->string('CPOCLI',10)->nullable();
           $table->string('CALCLI',100)->nullable();
           $table->string('NUMCLI',30)->nullable();
           $table->string('COLCLI',50)->nullable();
           $table->string('RFCCLI',20)->nullable();
           $table->string('EMACLI',100)->nullable();
           $table->string('TELCLI',100)->nullable();
           $table->string('LOCCLI',50)->nullable();
           $table->string('CIUCLI',100)->nullable();
           $table->string('EDOCLI',100)->nullable();
           $table->string('PAICLI',20)->nullable();
           $table->decimal('LIMCLI')->nullable();
           $table->decimal('CARCLI')->nullable();
           $table->decimal('ABOCLI')->nullable();
           $table->char('APLCED',1)->nullable();
           $table->char('APLIEP',1)->nullable();
           $table->char('APLRIV',1)->nullable();
           $table->integer('NIVPRE')->nullable();
           $table->char('SERPAR',1)->nullable();
           $table->char('PARPOL',1)->nullable();
           $table->string('RESFIS',3)->nullable();
           $table->string('CVEUSO',3)->nullable();
           $table->integer('idUsuario');

           $table->foreign('idUsuario')->references('id')->on('users');
           $table->primary('CVECLI');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('CLIENTES');
    }
}
