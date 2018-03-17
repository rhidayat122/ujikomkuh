<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Motor extends Model
{
    protected $fillable = ['id_merk','id_kategori','nama_motor','tahun_keluar','no_stnk','mesin','harga_jual','harga_beli','warna', 'gambar'];

    public function transaksi_jual()
    {
    	return $this->hasMany('App\Transaksijual');
    }

    public function transaksi_beli()
    {
    	return $this->hasMany('App\Transaksibeli');
    }
    public function kategori()
    {
    	return $this->belongsTo('App\kategori', 'id_kategori');
    }
    public function merk()
    {
    	return $this->belongsTo('App\merk','id_merk');
    }
}
