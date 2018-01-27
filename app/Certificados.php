<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Certificados extends Model
{
    protected $table = "CERTIFICADOS";

    protected $fillable = [
        'idUsuario'
        ,'idCERTIFICADOS'
        ,'CERDIGKEY'
        ,'CERDIGCER'
        ,'CERDIGNUM'
        ,'ARCHIVOKEY'
        ,'ARCHIVOCER'
        ,'CLAVE'
        ,'COMENTARIO'
    ];

    public $timestamps = false;
}
