<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Varios extends Model
{
    protected $table = "VARIOS";

    protected $fillable = [
        'idUsuario'
        ,'idVARIOS'
        ,'ENVCORR'
        ,'ARRENDAMIENTO'
        ,'HONORARIOS'
        ,'SERVPROF'
        ,'DONATIVOS'
        ,'HOSPEDAJE'
        ,'TEXTIVA'
        ,'NOAUT'
        ,'LEYENDA'
        ,'RETIVA'
        ,'RETISR'
        ,'RETCED'
        ,'FECHAAUT'
        ,'IMPEXCEL'
        ,'IVAPRO'
        ,'USARTRES'
    ];

    public $timestamps = false;
}
