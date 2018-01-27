<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Notario extends Model
{
    protected $table = "NOTARIO";

    protected $fillable = [
        'idUsuario'
        ,'id'
        ,'ENTIDADFED'
        ,'CURP'
        ,'NUMNOT'
        ,'ADSCRIPCION'
    ];

    public $timestamps = false;
}
