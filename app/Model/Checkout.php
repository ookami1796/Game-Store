<?php

namespace App\Model;


use Illuminate\database\Eloquent\Model;

class Checkout extends Model {
    public $table = 'checkout';

    protected $fillable = array('id_user','id_troli','id_pembayaran','id_ekspedisi','durasi');

    public function troli(){
        return $this->belongsTo(Troli::class,'id_troli');
    }
    public function pembayaran(){
        return $this->belongsTo(Payment::class,'id_pembayaran');
    }
    public function ekspedisi(){
        return $this->belongsTo(Pengiriman::class,'id_ekspedisi');
    }
}