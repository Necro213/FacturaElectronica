<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class IVA extends Model
{
    protected $table = "IMPUESTO";

    protected $fillable = [
        'CVETAS'
        ,'DESTAS'
        ,'VALTAS'
        ,'TIPFAC'
    ];

    public $timestamps = false;
}
