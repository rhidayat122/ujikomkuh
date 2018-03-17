<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class kategori extends Model
{
    protected $fillable = ['id','jenis'];


    public function kategori_motor()
    {
    	return $this->hasMany('App\Motor', 'id_kategori');
    }
}
