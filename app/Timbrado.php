<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Timbrado extends Model
{
    protected $table = "TIMBRADO";

    protected $fillable = [
        'idUsuario'
        ,'idTIMBRADO'
        ,'WERSERPRU'
        ,'USER'
        ,'PASS'
        ,'WEBSERONL'
        ,'PASSONL'
        ,'USERONL'
    ];

    public $timestamps = false;
}
