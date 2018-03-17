<?php

namespace App\Http\Controllers;

use App\Motor;
use Illuminate\Http\Request;
use App\Http\Requests;
use Yajra\Datatables\Html\Builder;
use Yajra\Datatables\Datatables;
use App\Book;
use Laratrust\LaratrustFacade as Laratrust;

class GuestController extends Controller
{

    public function index(Request $request, Builder $htmlBuilder)
    {
         $motors = Motor::paginate(6);
        return view('guest.index')->with(compact('motors'));
    }
    
    public function filter(Request $request)
    {
        
        if($request->jenis == 'all'){
            if($request->merk == 'all'){
                $filter = Motor::paginate(6);
                $jenis = "Semua";
                $merk = "Semua";
                $count= $filter->count();
            }else{
                $filter = Motor::where('id_merk',$request->merk)->paginate(6);
                $jenis= "Semua";
                $merk=$filter->first()->merk->merk;
                $count= $filter->count();
            }
        }else{
            if($request->merk == 'all'){
                $filter = Motor::where('id_kategori',$request->jenis)->paginate(6);
                $jenis=$filter->first()->kategori->jenis;
                $merk = "Semua";
                $count= $filter->count();
            }else{
                $filter = Motor::where('id_kategori',$request->jenis)->where('id_merk',$request->merk)->paginate(6);
                $jenis=$filter->first()->kategori->jenis;
                $merk=$filter->first()->merk->merk;
                $count= $filter->count();
            }
        }
      
         return view('guest.index')->with(compact('filter', 'jenis', 'merk', 'count'));
       
    }
}
