<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Emisor extends Model
{
    protected $table = "EMISOR";

    protected $fillable = [
        'idUsuario'
        ,'RAZSOC'
        ,'SUBTIT'
        ,'CP'
        ,'ESTADO'
        ,'CIUDAD'
        ,'LOCALIDAD'
        ,'CALLE'
        ,'NUMINT'
        ,'NUMEXT'
        ,'RFC'
        ,'PAIS'
        ,'REGFIS'
        ,'REGINC'
        ,'USEX'
        ,'PARODIF'
        ,'LOGO'
        ,'TEL'
        ,'MAIL'
        ,'PASS'
    ];

    public $timestamps = false;
}
