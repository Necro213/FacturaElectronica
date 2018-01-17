<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    protected $table = "PRODUCTOS";

    protected $fillable = [
        'CVEPRO'
        ,'CVETAS'
        ,'DESPRO'
        ,'UNIPRO'
        ,'FECPRO'
        ,'CODBAR'
        ,'PR1PRO'
        ,'PR2PRO'
        ,'PR3PRO'
        ,'PORFLE'
        ,'OBSREN'
        ,'CVEIEP'
        ,'CVEPROSAT'
        ,'CVEUNI'
        ,'idUsuario'
    ];

    public $timestamps = false;
}
