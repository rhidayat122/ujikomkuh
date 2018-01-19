<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaksi_Jual extends Model
{
    protected $fillable = ['motorbeli_id','pembeli_id','tgl','total_harga'];


    public function konsumen()
    {
    	return $this->belongsTo('App\Konsumen');
    }

    public function motor_beli()
    {
    	return $this->belongsTo('App\Motor');
    }
}
