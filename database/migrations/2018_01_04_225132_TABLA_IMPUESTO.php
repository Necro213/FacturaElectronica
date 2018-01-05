<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TABLAIMPUESTO extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('IMPUESTO',function (Blueprint $table){
            $table->integer('CVETAS');
            $table->string('DESTAS',30)->nullable();
            $table->decimal('VALTAS')->nullable();
            $table->string('TIPFAC',25)->nullable();

            $table->primary('CVETAS');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('IMPUESTO');
    }
}
