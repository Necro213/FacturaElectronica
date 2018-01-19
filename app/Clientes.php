<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Clientes extends Model
{
    protected $table = "CLIENTES";

    protected $fillable = [
        'CVECLI'
        ,'DESCLI'
        ,'RAZCLI'
        ,'CPOCLI'
        ,'CALCLI'
        ,'NUMCLI'
        ,'COLCLI'
        ,'RFCCLI'
        ,'EMACLI'
        ,'TELCLI'
        ,'LOCCLI'
        ,'CIUCLI'
        ,'EDOCLI'
        ,'PAICLI'
        ,'LIMCLI'
        ,'CARCLI'
        ,'ABOCLI'
        ,'APLCED'
        ,'APLIEP'
        ,'APLRIV'
        ,'NIVPRE'
        ,'SERPAR'
        ,'PARPOL'
        ,'RESFIS'
        ,'CVEUSO'
        ,'idUsuario'
    ];

    public $timestamps = false;
}
