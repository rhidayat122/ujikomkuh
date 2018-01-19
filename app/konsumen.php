<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Konsumen extends Model
{
    protected $fillable = ['nama','alamat','no_hp','no_ktp','status'];

    public function transaksi_jual()
    {
    	
    	return $this->hasMany('App\Transaksi_jual');
    }

    public function transaksi_beli()
    {
    	return $this->hasMany('App\Transaksi_beli');
    }
}
