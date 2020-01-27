<?php

namespace App\Model;


use Illuminate\database\Eloquent\Model;

class Pengiriman extends Model {
    public $table = 'pengiriman';

    protected $fillable = array('nama', 'no_resi');
    public function ekspedisi(){
        return $this->hasMany(Pengiriman::class,'id_pengiriman');
    }
}