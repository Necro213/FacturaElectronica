<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ConfigGen extends Model
{
    protected $table = "CONFGEN";

    protected $fillable = [
        'idUsuario'
        ,'id'
        ,'ANEXARAXML'
        ,'UTILIZARREM'
    ];

    public $timestamps = false;
}
