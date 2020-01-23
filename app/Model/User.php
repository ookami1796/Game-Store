<?php

namespace App\Model;


use Illuminate\Auth\Authenticatable;
use Laravel\Lumen\Auth\Authorizable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\database\Eloquent\Model;

use Tymon\JWTAuth\Contracts\JWTSubject;

class User extends Model implements AuthenticatableContract, AuthorizableContract, JWTSubject {

    use Authenticatable, Authorizable;
    public $table = 'user';

    protected $fillable = ['nama','username','password','no_telp','photo','role','alamat'];

    public $timestamps = true;

    protected $hidden = [
        'password',
    ];


    public function getJWTIdentifier(){
        return $this->getKey();
    }

    public function getJWTCustomClaims(){
        return [];
    }
}