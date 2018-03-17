<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Yajra\Datatables\Html\Builder;
use Yajra\Datatables\Datatables;

class KaryawanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, Builder $htmlBuilder)
    {
        if ($request->ajax()) {
            $karyawan = User::all();
            return Datatables::of($karyawan)->make(true);
        }

        $html = $htmlBuilder
        ->addColumn(['data' => 'nama', 'name'=>'nama', 'title' => 'Nama'])
        ->addColumn(['data' => 'jenis_kelamin', 'name'=>'jenis_kelamin', 'title' => 'Jenis Kelamin'])
        ->addColumn(['data' => 'alamat', 'name'=>'alamat', 'title' => 'Alamat'])
        ->addColumn(['data' => 'no_ktp', 'name'=>'no_ktp', 'title' => 'Nomor KTP'])
        ->addColumn(['data' => 'no_hp', 'name'=>'no_hp', 'title' => 'Nomor HP']);

        return view('karyawan.index')->with(compact('html'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('karyawan.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, ['name' => 'required|unique:karyawan']);
        $karyawan = karyawan::create($request->all());
        return redirect()->route('karyawan.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\karyawan  $karyawan
     * @return \Illuminate\Http\Response
     */
    public function show(karyawan $karyawan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\karyawan  $karyawan
     * @return \Illuminate\Http\Response
     */
    public function edit(karyawan $karyawan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\karyawan  $karyawan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, karyawan $karyawan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\karyawan  $karyawan
     * @return \Illuminate\Http\Response
     */
    public function destroy(karyawan $karyawan)
    {
        //
    }
}
