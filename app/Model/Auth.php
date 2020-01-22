<?php

namespace App\Model;


use Illuminate\Auth\Authenticatable;
use Laravel\Lumen\Auth\Authorizable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\database\Eloquent\Model;

class Auth extends Model implements AuthenticatableContract, AuthorizableContract {

    use Authenticatable, Authorizable;
    public $table = 'user';

    protected $fillable = ['nama','username','password','no_telp','photo','role','alamat'];

    protected $hidden = [
        'password',
    ];
}