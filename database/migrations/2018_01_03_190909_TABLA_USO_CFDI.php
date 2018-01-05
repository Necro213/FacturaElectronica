<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TABLAUSOCFDI extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('USOCFDI',function (Blueprint $table){
            $table->string('CVEUSO',3);
            $table->string('DESUSO',250)->nullable();
            $table->char('STSFIS',2)->nullable();
            $table->char('STSMOR',2)->nullable();

            $table->primary('CVEUSO');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('USOCFDI');
    }
}
