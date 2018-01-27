<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sucursal extends Model
{
    protected $table = "SUCURSAL";

    protected $fillable = [
        'idUsuario'
        ,'idSUCURSAL'
        ,'CP'
        ,'ESTADO'
        ,'CIUDAD'
        ,'LOCALIDAD'
        ,'CALLE'
        ,'NUMINT'
        ,'NUMEXT'
        ,'COLONIA'
    ];

    public $timestamps = false;
}
