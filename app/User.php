<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    protected $table = "users";

    protected $fillable = [
        'nombre',
        'ap_pat',
        'ap_mat',
        'username'
        ,'password'
        ,'level'
        ,'status'
        ,'idReferencia'
        ];

    public $timestamps = false;
}
