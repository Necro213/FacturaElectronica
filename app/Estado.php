<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Estado extends Model
{
    protected $table = "ENTIDADFEDERATIVA";

    protected $fillable = [
        'TIPENT',
        'DESENT'
    ];

    public $timestamps = false;
}
