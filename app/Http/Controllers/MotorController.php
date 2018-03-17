<?php

namespace App\Http\Controllers;

use App\Motor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\File;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Auth;
use Yajra\Datatables\Html\Builder;
use Yajra\Datatables\Datatables;    
use Validator;

class MotorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, Builder $htmlBuilder)
    {
         $motors = Motor::paginate(6);
        return view('motors.index')->with(compact('motors'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('motors.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
   public function store(Request $request)
    {
         $motor = Motor::create($request->except('gambar'));

        // Isi field cover jika ada cover yang diupload
        if ($request->hasFile('gambar')) {
            // Mengambil file yang diupload
            $uploaded_cover = $request->file('gambar');

            // Mengambil extension file
            $extension = $uploaded_cover->getClientOriginalExtension();

            // Membuat nama file random berikut extension
            $filename = md5(time()) . '.' . $extension;

            // Menyimpan cover ke folder public/img
            $destinationPath = public_path() . DIRECTORY_SEPARATOR . 'img';
            $uploaded_cover->move($destinationPath, $filename);

            // Mengisi field cover di book dengan filename yang harus dibuat
            $motor->gambar = $filename;
            $motor->save();
        }

        Session::flash("flash_notification", [
            "level"     => "success",
            "message"   => "Berhasil menyimpan $motor->merk_motor"
        ]);


        return redirect()->route('motors.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\motor  $motor
     * @return \Illuminate\Http\Response
     */

    public function show($id)
    {
        //
    }

   public function edit($id)
    {
        $motor = Motor::find($id);

        return view('motors.edit')->with(compact('motor'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\motor  $motor
     * @return \Illuminate\Http\Response
     */

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\motor  $motor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $motor = Motor::find($id);
        if (!$motor->update($request->all())) return redirect()->back();

        // Isi field cover jika ada cover yang diupload
        if ($request->hasFile('gambar')) {
            // Mengambil file yang diupload berikut eksistensinya
            $filename = null;
            $uploaded_cover = $request->file('gambar');

            // Mengambil extension file
            $extension = $uploaded_cover->getClientOriginalExtension();

            // Membuat nama file random berikut extension
            $filename = md5(time()) . '.' . $extension;

            // Menyimpan cover ke folder public/img
            $destinationPath = public_path() . DIRECTORY_SEPARATOR . 'img';
            $uploaded_cover->move($destinationPath, $filename);

            // Hapus cover lama, jika ada
            if ($motor->gambar) {
                $old_cover = $motor->gambar;
                $filepath = public_path() . DIRECTORY_SEPARATOR . 'img' . DIRECTORY_SEPARATOR . $motor->gambar;

                try {
                    File::delete($filepath);
                } catch (FileNotFoundException $e) {
                    // File sudah dihapus / tidak ada
                }
            }

            // Ganti field cover dengan cover yang baru
            $motor->gambar = $filename;
            $motor->save();
        }

        Session::flash("flash_notification", [
            "level" => "success",
            "message" => "Berhasil menyimpan $motor->merk_motor"
        ]);

        return redirect()->route('motors.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\motor  $motor
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $motor = Motor::find($id);
        $gambar = $motor->gambar;

        if (!$motor->delete()) return redirect()->back();

        // Handle hapus motor via Ajax
        if ($request->ajax()) return response()->json(['id' => $id]);
        
        // Hapus cover lama jika ada
        if ($gambar) {
            $old_cover = $motor->gambar;
            $filepath = public_path() . DIRECTORY_SEPARATOR . 'img' . DIRECTORY_SEPARATOR . $motor->gambar;

            try {
                File::delete($filepath);
            } catch (FileNotFoundException $e) {
                // File sudah dihapus / tidak ada
            }
        }

        Session::flash("flash_notification", [
            "level"     =>  "success",
            "message"   =>  "Motor berhasil dihapus"
        ]);

        return redirect()->route('motors.index');
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
      
         return view('motors.index')->with(compact('filter', 'jenis', 'merk', 'count'));
       
    }
}
