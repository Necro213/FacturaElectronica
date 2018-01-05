<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TABLACONTAFACTURAS extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('CONTA_FACTURAS',function (Blueprint $table){
           $table->string('UUID',36);
           $table->string('FECHATIM',100)->nullable();
           $table->string('TIPOCOMPROBANTE',100)->nullable();
           $table->string('METODOPAGO',100)->nullable();
           $table->string('FOLIO',20)->nullable();
           $table->string('SERIE',10)->nullable();
           $table->decimal('SUBTOTAL')->nullable();
           $table->decimal('DESCUENTO')->nullable();
           $table->decimal('TOTAL')->nullable();
           $table->string('CONDICIONESDEPAGO',100)->nullable();
           $table->string('EMISORNOMBRE',600)->nullable();
           $table->string('EMISORRFC',13)->nullable();
           $table->string('EMISORCP',5)->nullable();
           $table->string('EMISORPAIS',50)->nullable();
           $table->string('EMISORESTADO',250)->nullable();
           $table->string('EMISORMUNICIPIO',250)->nullable();
           $table->string('EMISORLOCALIDAD',250)->nullable();
           $table->string('EMISORCOLONIA',250)->nullable();
           $table->string('EMISORCALLE',200)->nullable();
           $table->string('EMISORNUMEXT',50)->nullable();
           $table->string('EMISORNUMINT',50)->nullable();
           $table->string('MONEDA',20)->nullable();
           $table->string('TIPOCAMBIO',10)->nullable();
           $table->string('RECEPTORNOMBRE',600)->nullable();
           $table->string('RECEPTORRFC',13)->nullable();
           $table->string('RECEPTORCP',5)->nullable();
           $table->string('RECEPTORPAIS',50)->nullable();
           $table->string('RECEPTORESTADO',250)->nullable();
           $table->string('RECEPTORMUNICIPIO',250)->nullable();
           $table->string('RECEPTORLOCALIDAD',250)->nullable();
           $table->string('RECEPTORCOLONIA',250)->nullable();
           $table->string('RECEPTORCALLE',200)->nullable();
           $table->string('RECEPTORNUMEXT',50)->nullable();
           $table->string('RECEPTORNUMINT',50)->nullable();
           $table->string('RECEPTORMONEDA',20)->nullable();
           $table->char('STSFAC',1)->nullable();
           $table->char('STSASO',1)->nullable();
           $table->char('STSCAN',1)->nullable();
           $table->decimal('TOTALIMPUESTOSTRASLADOS')->nullable();
           $table->decimal('TOTALIMPUESTOSRETENIDOS')->nullable();
           $table->string('REGISTROPATRONAL',50)->nullable();
           $table->string('NUMEMPLEADO',20)->nullable();
           $table->string('FECHAPAGO',100)->nullable();
           $table->string('PUESTO',100)->nullable();
           $table->string('DEPARTAMENTO',100)->nullable();
           $table->string('TIPOCONTRATO',100)->nullable();
           $table->string('JORDANADA',100)->nullable();
           $table->string('PERIOCIDADDEPAGO',100)->nullable();
           $table->text('XML')->nullable();
           $table->char('STSUUID',1)->nullable();
           $table->string('VALUUID',300)->nullable();
           $table->dateTime('FECORG')->nullable();
           $table->string('FECHAEXP',100)->nullable();
           $table->string('FECPAG',100)->nullable();
           $table->string('FECINI',100)->nullable();
           $table->string('FECFIN',100)->nullable();
           $table->string('CVEUSO',3)->nullable();
           $table->string('VERSION',4)->nullable();
           $table->integer('idUsuario');

            $table->primary('UUID');
            $table->foreign('idUsuario')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('CONTA_FACTURAS');
    }
}
