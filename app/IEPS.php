<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class IEPS extends Model
{
    protected $table = "IEPS";

    protected $fillable = [
        'CVEIEP'
        ,'DESIEP'
        ,'VALIEP'
        ,'TIPFAC'
    ];

    public $timestamps = false;
}
