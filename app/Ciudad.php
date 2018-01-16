<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ciudad extends Model
{
    protected $table = "MUNICIPIOS";

    protected $fillable = [
        'CVEMUN',
        'DESMUN',
        'DESEDO'
    ];

    public $timestamps = false;
}
