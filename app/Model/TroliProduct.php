<?php

namespace App\Model;


use Illuminate\database\Eloquent\Model;

class TroliProduct extends Model {
    public $table = 'troli_produk';

    protected $fillable = array('id_troli','id_produk','jumlah_produk');

    public $timestamps = true;

}