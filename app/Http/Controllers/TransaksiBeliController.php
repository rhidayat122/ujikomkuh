<?php

namespace App\Http\Controllers;

use App\Transaksibeli;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\File;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Auth;
use Yajra\Datatables\Html\Builder;
use Yajra\Datatables\Datatables;    
use Validator;



class TransaksiBeliController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $motors = Transaksibeli::All();
        return view('transaksibelis.index')->with(compact('motors'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('transaksibelis.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\transaksi_beli  $transaksi_beli
     * @return \Illuminate\Http\Response
     */
    public function show(transaksi_beli $transaksi_beli)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\transaksi_beli  $transaksi_beli
     * @return \Illuminate\Http\Response
     */
    public function edit(transaksi_beli $transaksi_beli)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\transaksi_beli  $transaksi_beli
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, transaksi_beli $transaksi_beli)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\transaksi_beli  $transaksi_beli
     * @return \Illuminate\Http\Response
     */
    public function destroy(transaksi_beli $transaksi_beli)
    {
        //
    }
}
