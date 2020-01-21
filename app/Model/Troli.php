<?php

namespace App\Model;


use Illuminate\database\Eloquent\Model;

class Troli extends Model {
    public $table = 'troli';

    protected $fillable = array('id_user','id_produk','jumlah_produk');
}