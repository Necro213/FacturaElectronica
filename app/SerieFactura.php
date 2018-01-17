<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SerieFactura extends Model
{
    protected $table = "SERIEFACTURA";

    protected $fillable = [
        'CVESER'
        ,'DESSER'
        ,'FOLINI'
        ,'FOLFIN'
        ,'FOLACT'
        ,'idUsuario'
    ];

    public $timestamps = false;
}
