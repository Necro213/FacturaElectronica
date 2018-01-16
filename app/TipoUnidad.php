<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipoUnidad extends Model
{
    protected $table = "UNIMED";

    protected $fillable = [
        'CVEUNI'
        ,'NOMUNI'
        ,'CVEUNISAT'
    ];

    public $timestamps = false;
}
