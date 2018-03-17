@extends('layouts.temp')

@section('title')
Transaksi Beli zl
@endsection
@section('content')
<div class="row">
    <div class="col-sm 12">
        <div class="card">
            <div class="card-block">
                <span class="pull-right"><a href="{{ url('/karyawan/motors/create') }}" class="btn btn-primary">Tambah Data</a></span>
            </div>
        </div>
    </div>
</div>
<div class="row">

@foreach($motors as $data)

    <!-- Column -->
<!--     <div class="col-sm-4">
        <div class="card">
            <div class="card-block">
                <h4 class="card-title">{{$data->merk_motor}}</h4>
                <div class="text-right">
                
                </div>
                <span class="text-primary">Nomor Stnk</span><span class="pull-right">{{$data->no_stnk}}</span><br>
                <span class="text-primary">Harga Beli</span><span class="pull-right">{{$data->harga_beli}}</span><br>
                <span class="text-primary">Harga Jual</span><span class="pull-right">{{$data->harga_jual}}</span><br>
                <span class="text-primary">Warna</span><span class="pull-right">{{$data->warna}}</span><br>
                <span class="text-primary">Tahun</span><span class="pull-right">{{$data->tahun_keluar}}</span><br>
               
            </div>
        </div>
    </div> -->
    <div class="col-lg-4 col-xlg-3 col-md-5">
        <div class="card">
            <div class="card-block">
                <center class="m-t-30"> <img width="150" class="img-circle" src="{{asset('/img/'.$data->gambar)}}" style="width:160px;height:160px">
                    <h4 class="card-title m-t-10">{{$data->merk_motor}}</h4>
                    </center>
                    <div ?>
                       <span class="text-primary">Nomor Stnk</span><span class="pull-right">{{$data->no_stnk}}</span><br>
                    <span class="text-primary">Harga Beli</span><span class="pull-right">Rp.{{number_format($data->harga_beli,2,'.',',')}}</span><br>
                    <span class="text-primary">Harga Jual</span><span class="pull-right">Rp.{{number_format($data->harga_jual,2,'.',',')}}</span><br>
                    <span class="text-primary">Warna</span><span class="pull-right">{{$data->warna}}</span><br>
                    <span class="text-primary">Tahun</span><span class="pull-right">{{$data->tahun_keluar}}</span><br> 
                    </div>

                   <br>
                <span class="pull-right"><a href="{{ route('transaksibelis.create', $data->id) }}" class="btn btn-danger">Transaksi</a></span> <span class="pull-left"><a href="{{ route('motors.edit', $data->id) }}"  class="btn btn-success">Ubah</a></span> <!-- <span <a href="{{ route('motors.destroy', $data->id) }}"  class="btn btn-warning">Hapus</a></span>
 -->            
            </div>
        </div>
    </div>
@endforeach
    <!-- Column -->
 </div>
@endsection
