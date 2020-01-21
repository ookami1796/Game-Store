<?php

namespace App\Model;


use Illuminate\database\Eloquent\Model;

class Category extends Model {
    public $table = 'kategori';

    protected $fillable = array('nama');

    public $timestamps = true;
}