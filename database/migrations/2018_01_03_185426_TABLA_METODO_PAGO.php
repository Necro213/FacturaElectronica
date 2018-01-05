<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TABLAMETODOPAGO extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Metodo_Pago',function (Blueprint $table){
            $table->char('Clave_Met',2);
            $table->string('Desc_Met',150);

            $table->primary('Clave_Met');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('Metodo_Pago');
    }
}
