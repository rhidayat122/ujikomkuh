<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Motor extends Model
{
    protected $fillable = ['merk_motor','tahun_keluar','no_stnk','harga_jual','harga_beli','warna', 'gambar'];

    public function transaksi_jual()
    {
    	return $this->hasMany('App\Transaksi_Jual');
    }

    public function transaksi_beli()
    {
    	return $this->hasMany('App\Transaksi_Beli');
    }
}
