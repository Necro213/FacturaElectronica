<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TABLAPRODUCTOSSAT extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('PRODUCTOSSAT',function (Blueprint $table){
            $table->string('CVEPROSAT',10);
            $table->string('DESPROSAT',250)->nullable();

            $table->primary('CVEPROSAT');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::create('PRODUCTOSSAT');
    }
}
