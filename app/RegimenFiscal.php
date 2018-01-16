<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RegimenFiscal extends Model
{
    protected $table = "REGIMENFISCAL";

    protected $fillable = [
        'CVEREG'
        ,'DESREG'
        ,'STSFIS'
        ,'STSMOR'
    ];

    public $timestamps = false;
}
