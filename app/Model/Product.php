<?php

namespace App\Model;


use Illuminate\database\Eloquent\Model;

class Product extends Model {
    public $table = 'product';

    protected $fillable = array('no_seri', 'nama_produk', 'id_kategori', 'harga', 'photo_produk', 'deskripsi');

    public function category(){
        return $this->belongsTo(Category::class, 'id_kategori');
    }
}