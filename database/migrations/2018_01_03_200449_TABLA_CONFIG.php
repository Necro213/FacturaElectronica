<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TABLACONFIG extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('CONFIG',function (Blueprint $table){
           $table->integer('idUsuario');
           $table->string('RAZ1CFG',100);
           $table->string('RAZ2CFG',100)->nullable();
           $table->integer('CPOCFG')->nullable();
           $table->string('LOCCFG',100)->nullable();
           $table->string('CIUCFG',100)->nullable();
           $table->string('EDOCFG',100)->nullable();
           $table->string('COLCFG',100)->nullable();
           $table->string('CALCFG',100)->nullable();
           $table->string('PAICFG',20)->nullable();
           $table->string('NUMCFG',10)->nullable();
           $table->string('RFCCFG',20)->nullable();
           $table->string('EMACFG',100)->nullable();
           $table->string('TELCFG',100)->nullable();
           $table->string('REGCFG',100)->nullable();
           $table->string('PAGCFG',100)->nullable();
           $table->string('CERCFG',4000)->nullable();
           $table->string('FIRCFG',250)->nullable();
           $table->string('DIGCFG',250)->nullable();
           $table->string('DIRCFG',250)->nullable();
           $table->char('TIPCFG',1)->nullable();
           $table->char('TILCFG',1)->nullable();
           $table->char('TBBCFG',1)->nullable();
           $table->string('SFICFG',50)->nullable();
           $table->string('LOGPCFG',25)->nullable();
           $table->string('PASPCFG',25)->nullable();
           $table->string('LOGLCFG',25)->nullable();
           $table->string('PASLCFG',25)->nullable();
           $table->string('APRCFG',250)->nullable();
           $table->dateTime('VIGCFG')->nullable();
           $table->char('COP1CFG',1)->nullable();
           $table->string('IMP1CFG',250)->nullable();
           $table->string('BAN1CFG',250)->nullable();
            $table->char('COP2CFG',1)->nullable();
            $table->string('IMP2CFG',250)->nullable();
            $table->string('BAN2CFG',250)->nullable();
            $table->char('COP3CFG',1)->nullable();
            $table->string('IMP3CFG',250)->nullable();
            $table->string('BAN3CFG',250)->nullable();
            $table->char('COP4CFG',1)->nullable();
            $table->string('IMP4CFG',250)->nullable();
            $table->string('BAN4CFG',250)->nullable();
            $table->binary('LOGCFG')->nullable();
            $table->binary('LBBCFG')->nullable();
            $table->char('ENVEMACFG',1)->nullable();
            $table->string('PASCFG',25)->nullable();
            $table->string('MODCFG',1)->nullable();
            $table->char('RECARRE',1)->nullable();
            $table->char('RECHON',1)->nullable();
            $table->float('RETISR')->nullable();
            $table->float('RETIVA')->nullable();
            $table->float('RETCEL')->nullable();
            $table->char('SERPRO',1)->nullable();
            $table->char('MODCON',1)->nullable();
            $table->string('QRYCON',2000)->nullable();
            $table->char('FACTRS',1)->nullable();
            $table->char('RECDON',1)->nullable();
            $table->string('TEXADI',500)->nullable();
            $table->char('DESIVA',1)->nullable();
            $table->string('NUMINTCFG',10)->nullable();
            $table->string('EDOCFG_SUC',100)->nullable();
            $table->string('CALCFG_SUC',100)->nullable();
            $table->string('NUMCFG_SUC',10)->nullable();
            $table->string('NUMINTCFG_SUC',10)->nullable();
            $table->string('COLCFG_SUC',100)->nullable();
            $table->string('LOCCFG_SUC',100)->nullable();
            $table->string('CIUCFG_SUC',100)->nullable();
            $table->string('CPOCFG_SUC',5)->nullable();
            $table->char('NOTSER',1)->nullable();
            $table->string('FORDEC',50)->nullable();
            $table->string('TEXRET',50)->nullable();
            $table->string('CLACSD',50)->nullable();
            $table->string('FILKEY',1000)->nullable();
            $table->string('FILCER',1000)->nullable();
            $table->char('STSDOSLIS',1)->nullable();
            $table->string('TEXIVA',50)->nullable();
            $table->char('SERPAR',1)->nullable();
            $table->string('NUMAUT',50)->nullable();
            $table->dateTime('FECAUT')->nullable();
            $table->char('METPAG',3)->nullable();
            $table->string('CVEREG',3)->nullable();
            $table->char('MODINT',1)->nullable();

            $table->primary('RAZ1CFG');
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
        Schema::drop('CONFIG');
    }
}
