<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaksibeli extends Model
{
    protected $fillable = ['motorjual_id','penjual_id','tgl','total_harga'];


    public function konsumen()
    {
    	return $this->belongsTo('App\Konsumen');
    }

    public function motor_jual()
    {
    	return $this->belongsTo('App\Motor');
    }
}
