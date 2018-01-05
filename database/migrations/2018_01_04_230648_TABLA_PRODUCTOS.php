<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TABLAPRODUCTOS extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('PRODUCTOS',function (Blueprint $table){
           $table->integer('CVEPRO');
           $table->integer('CVETAS')->nullable();
           $table->string('DESPRO',4000)->nullable();
           $table->string('UNIPRO',30)->nullable();
           $table->dateTime('FECPRO')->nullable();
           $table->string('CODBAR',30)->nullable();
           $table->decimal('PR1PRO')->nullable();
           $table->decimal('PR2PRO')->nullable();
           $table->decimal('PR3PRO')->nullable();
           $table->float('PORFLE')->nullable();
           $table->string('OBSREN',2000)->nullable();
           $table->integer('CVEIEP')->nullable();
           $table->string('CVEPROSAT',10)->nullable();
           $table->integer('CVEUNI')->nullable();

           $table->primary('CVEPRO');
           $table->foreign('CVETAS')->references('CVETAS')->on('IMPUESTO');
           $table->foreign('CVEIEP')->references('CVEIEP')->on('IEPS');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('PRODUCTOS');
    }
}
