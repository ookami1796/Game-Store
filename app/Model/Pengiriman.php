<?php

namespace App\Model;


use Illuminate\database\Eloquent\Model;

class Pengiriman extends Model {
    public $table = 'pengiriman';

    protected $fillable = array('nama', 'no_resi');
}