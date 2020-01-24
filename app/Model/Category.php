<?php

namespace App\Model;


use Illuminate\database\Eloquent\Model;

class Category extends Model {
    public $table = 'kategori';

    protected $fillable = array('nama');

    public $timestamps = true;

    public function product(){
        return $this->hasMany(Product::class,'id_kategori');
    }
}