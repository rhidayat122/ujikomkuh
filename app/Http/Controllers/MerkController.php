<?php

namespace App\Http\Controllers;

use App\merk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Yajra\Datatables\Html\Builder;
use Yajra\Datatables\Datatables;

class MerkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, Builder $htmlBuilder)
    {
        if ($request->ajax()) {
            $merks = merk::select(['id', 'merk']);

            return Datatables::of($merks)
                ->addColumn('action', function($merk) {
                    return view('datatable._action', [
                        'model'             =>  $merk,
                        'form_url'          =>  route('merks.destroy', $merk->id),
                        'edit_url'          =>  route('merks.edit', $merk->id),
                        'confirm_message'   =>  'Yakin mau menghapus ' . $merk->merk . '?'
                    ]);
            })->make(true);
        }

        $html = $htmlBuilder
            ->addColumn(['data' => 'merk', 'name' => 'merk', 'title' => 'Merk'])
            ->addColumn(['data' => 'action', 'name' => 'action', 'title' => '', 'orderable' => false, 'searchable' => false]);

        return view('merks.index')->with(compact('html'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('merks.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         $merk = merk::create($request->all());

        Session::flash("flash_notification", [
            "level"     => "success",
            "message"   => "Berhasil menyimpan $merk->merk"
        ]);

        return redirect()->route('merks.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\merk  $merk
     * @return \Illuminate\Http\Response
     */
    public function show(merk $merk)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\merk  $merk
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $merk = merk::find($id);

        return view('merks.edit')->with(compact('merk'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\merk  $merk
     * @return \Illuminate\Http\Response
     */
   public function update(Request $request, $id)
    {
        $merk = merk::find($id);
        
        $merk->update($request->only('merk'));
        
        Session::flash("flash_notification", [
            "level"     => "success",
            "message"   => "Berhasil menyimpan $merk->merk"
        ]);

        return redirect()->route('merks.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\merk  $merk
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         if (!merk::destroy($id)) return redirect()->back();

        Session::flash("flash_notification", [
            "level" => "success",
            "message" => "Merk berhasil dihapus"
        ]);

        return redirect()->route('merks.index');
    }
}
