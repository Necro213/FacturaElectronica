<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TABLACFDIRELACIONADO extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('CFDI_Relacionado',function (Blueprint $table){
           $table->integer('NUM_FOL');
           $table->integer('FOL_REL');
           $table->string('UUID',100);
           $table->string('tip_rel',2);

           $table->primary(['NUM_FOL','FOL_REL','UUID']);

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('CFDI_Relacionado');
    }
}
