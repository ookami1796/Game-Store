<?php

namespace App\Model;


use Illuminate\database\Eloquent\Model;

class Troli extends Model {
    public $table = 'troli';

    protected $fillable = array('id_user');
    public function products(){
        return $this->belongsToMany(Product::class, 'troli_produk', 'id_troli', 'id_produk')
        ->withPivot(['jumlah_produk']);
    }
}