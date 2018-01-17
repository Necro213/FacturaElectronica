<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Config extends Model
{
    protected $table = "IEPS";

    protected $fillable = [
        'idUsuario'
        ,'RAZ1CFG'
        ,'RAZ2CFG'
        ,'CPOCFG'
        ,'LOCCFG'
        ,'CIUCFG'
        ,'EDOCFG'
        ,'COLCFG'
        ,'CALCFG'
        ,'PAICFG'
        ,'NUMCFG'
        ,'RFCCFG'
        ,'EMACFG'
        ,'TELCFG'
        ,'REGCFG'
        ,'PAGCFG'
        ,'CERCFG'
        ,'FIRCFG'
        ,'DIGCFG'
        ,'DIRCFG'
        ,'TIPCFG'
        ,'TILCFG'
        ,'TBBCFG'
        ,'SFICFG'
        ,'LOGPCFG'
        ,'PASPCFG'
        ,'LOGLCFG'
        ,'PASLCFG'
        ,'APRCFG'
        ,'VIGCFG'
        ,'COP1CFG'
        ,'IMP1CFG'
        ,'BAN1CFG'
        ,'COP2CFG'
        ,'IMP2CFG'
        ,'BAN2CFG'
        ,'COP3CFG'
        ,'IMP3CFG'
        ,'BAN3CFG'
        ,'COP4CFG'
        ,'IMP4CFG'
        ,'BAN4CFG'
        ,'LOGCFG'
        ,'LBBCFG'
        ,'ENVEMACFG'
        ,'PASCFG'
        ,'MODCFG'
        ,'RECARRE'
        ,'RECHON'
        ,'RETISR'
        ,'RETIVA'
        ,'RETCEL'
        ,'SERPRO'
        ,'MODCON'
        ,'QRYCON'
        ,'FACTRS'
        ,'RECDON'
        ,'TEXADI'
        ,'DESIVA'
        ,'NUMINTCFG'
        ,'EDOCFG_SUC'
        ,'CALCFG_SUC'
        ,'NUMCFG_SUC'
        ,'NUMINTCFG_SUC'
        ,'COLCFG_SUC'
        ,'LOCCFG_SUC'
        ,'CIUCFG_SUC'
        ,'CPOCFG_SUC'
        ,'NOTSER'
        ,'FORDEC'
        ,'TEXRET'
        ,'CLACSD'
        ,'FILKEY'
        ,'FILCER'
        ,'STSDOSLIS'
        ,'TEXIVA'
        ,'SERPAR'
        ,'NUMAUT'
        ,'FECAUT'
        ,'METPAG'
        ,'CVEREG'
        ,'MODINT'
    ];

    public $timestamps = false;
}
