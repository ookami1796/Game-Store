<?php

namespace App\Model;


use Illuminate\database\Eloquent\Model;

class User extends Model {
    public $table = 'user';

    protected $fillable = array('nama','username','password','no_telp','photo','role','alamat');
}