<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ServiciosSAT extends Model
{
    protected $table = "PRODUCTOSSAT";

    protected $fillable = [
        'CVEPROSAT'
        ,'DESPROSAT'
    ];

    public $timestamps = false;
}
