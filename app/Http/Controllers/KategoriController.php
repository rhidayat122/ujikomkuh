<?php

namespace App\Http\Controllers;

use App\kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Yajra\Datatables\Html\Builder;
use Yajra\Datatables\Datatables;
class KategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, Builder $htmlBuilder)
    {
        if ($request->ajax()) {
            $kategoris = kategori::select(['id', 'jenis']);

            return Datatables::of($kategoris)
                ->addColumn('action', function($kategori) {
                    return view('datatable._action', [
                        'model'             =>  $kategori,
                        'form_url'          =>  route('kategoris.destroy', $kategori->id),
                        'edit_url'          =>  route('kategoris.edit', $kategori->id),
                        'confirm_message'   =>  'Yakin mau menghapus ' . $kategori->jenis . '?'
                    ]);
            })->make(true);
        }

        $html = $htmlBuilder
            ->addColumn(['data' => 'jenis', 'name' => 'jenis', 'title' => 'Jenis'])
            ->addColumn(['data' => 'action', 'name' => 'action', 'title' => '', 'orderable' => false, 'searchable' => false]);

        return view('kategoris.index')->with(compact('html'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('kategoris.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $kategori = kategori::create($request->all());

        Session::flash("flash_notification", [
            "level"     => "success",
            "message"   => "Berhasil menyimpan $kategori->jenis"
        ]);

        return redirect()->route('kategoris.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\kategori  $kategori
     * @return \Illuminate\Http\Response
     */
    public function show(kategori $kategori)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\kategori  $kategori
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $kategori = kategori::find($id);

        return view('kategoris.edit')->with(compact('kategori'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\kategori  $kategori
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $kategori = kategori::find($id);
        
        $kategori->update($request->only('jenis'));
        
        Session::flash("flash_notification", [
            "level"     => "success",
            "message"   => "Berhasil menyimpan $kategori->jenis"
        ]);

        return redirect()->route('kategoris.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\kategori  $kategori
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         if (!kategori::destroy($id)) return redirect()->back();

        Session::flash("flash_notification", [
            "level" => "success",
            "message" => "Kategori berhasil dihapus"
        ]);

        return redirect()->route('kategoris.index');
    }
}
