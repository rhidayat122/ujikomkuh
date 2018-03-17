<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class merk extends Model
{
     protected $fillable = ['id','merk'];


    public function merk_motor()
    {
    	return $this->hasMany('App\Motor','id_merk');
    }
}
