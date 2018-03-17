@extends('layouts.temp')

@section('title')
List Motor
@endsection
@section('content')
<div class="row">
    <div class="col-sm 12">
        <div class="card">
        <div class="card-block">
               <form action="{{url('/filter/motor')}}" method="get" class="form-inline">
                   {{csrf_field()}}
                   <label>Jenis Motor</label>&nbsp;&nbsp;&nbsp; 
                   <select class="form-control" name="jenis">
                        <option value="all">Semua</option>
                        @foreach(App\kategori::all() as $data)
                        <option value="{{$data->id}}">{{$data->jenis}}</option>
                        @endforeach
                    </select>&nbsp;&nbsp;&nbsp; 
                    <label>Merk Motor</label>&nbsp;&nbsp;&nbsp; 
                     <select class="form-control" name="merk">
                        <option value="all">Semua</option>
                        @foreach(App\merk::all() as $data)
                        <option value="{{$data->id}}">{{$data->merk}}</option>
                        @endforeach
                    </select>&nbsp;&nbsp;&nbsp; 
                    <button class="btn btn-primary" type="submit"><i class="fa fa-search"></i></button>
               </form>
            </div>
            <div class="card-block">
                <span class="pull-right"><a href="{{ url('/karyawan/motors/create') }}" class="btn btn-primary">Tambah Data</a></span>
            </div>
        </div>
    </div>
</div>
@if(isset($filter))
<div class="row">
    <div class="col-sm 12">
        <div class="card">
            <div class="card-block">
            <p><h2>Pencarian Dengan Data Berdasarkan</h2></p>
            <label><h3>Jenis Motor : </h3></label>  {{$jenis}}<label><h3>&nbsp;&nbsp;Merk Motor : </h3></label>&nbsp;&nbsp;{{$merk}}
            <p><h3>Di peroleh {{$count}} data</h3></p>
            </div>
        </div>
    </div>
</div>
<div class="row">
@foreach($filter as $data)
    <div class="col-lg-4 col-xlg-3 col-md-5">
        <div class="card">
            <div class="card-block">
                <center class="m-t-30"> <img width="150" class="img-circle" src="{{asset('/img/'.$data->gambar)}}" style="width:160px;height:160px">
                    <h4 class="card-title m-t-10">{{$data->nama_motor}}</h4>
                    </center>
                    <div>
                    <span class="text-primary">Kategori</span><span class="pull-right">{{$data->kategori->jenis}}</span><br>
                    <span class="text-primary">Merk</span><span class="pull-right">{{$data->merk->merk}}</span><br>
                    <span class="text-primary">Nomor Stnk</span><span class="pull-right">{{$data->no_stnk}}</span><br>
                    <span class="text-primary">Harga Beli</span><span class="pull-right" style="font-size:13px;">Rp.{{number_format($data->harga_beli,2,'.',',')}}</span><br>
                    <span class="text-primary">Harga Jual</span><span class="pull-right" style="font-size:13px;">Rp.{{number_format($data->harga_jual,2,'.',',')}}</span><br>
                    <span class="text-primary">Warna</span><span class="pull-right">{{$data->warna}}</span><br>
                    <span class="text-primary">Tahun</span><span class="pull-right">{{$data->tahun_keluar}}</span><br> 
                    </div>

                   <br>
                <span class="pull-right"><a href="{{ route('motors.destroy', $data->id) }}" class="btn btn-danger">Hapus</a></span> <span class="pull-left"><a href="{{ route('motors.edit', $data->id) }}"  class="btn btn-success">Ubah</a></span>        
            </div>
        </div>
    </div>
@endforeach
</div>
<div class="row">
    <div class="col-sm 12">
        <div class="card">
            <div class="card-block">
           {{$filter->render()}}
            </div>
        </div>
    </div>
</div>
@else
<div class="row">
@foreach($motors as $data)

    <div class="col-lg-4 col-xlg-3 col-md-5">
        <div class="card">
            <div class="card-block">
                <center class="m-t-30"> <img width="150" class="img-circle" src="{{asset('/img/'.$data->gambar)}}" style="width:160px;height:160px">
                    <h4 class="card-title m-t-10">{{$data->nama_motor}}</h4>
                    </center>
                    <div>
                    <span class="text-primary">Kategori</span><span class="pull-right">{{$data->kategori->jenis}}</span><br>
                    <span class="text-primary">Merk</span><span class="pull-right">{{$data->merk->merk}}</span><br>
                    <span class="text-primary">Nomor Stnk</span><span class="pull-right">{{$data->no_stnk}}</span><br>
                    <span class="text-primary">Harga Beli</span><span class="pull-right" style="font-size:13px;">Rp.{{number_format($data->harga_beli,2,'.',',')}}</span><br>
                    <span class="text-primary">Harga Jual</span><span class="pull-right" style="font-size:13px;">Rp.{{number_format($data->harga_jual,2,'.',',')}}</span><br>
                    <span class="text-primary">Warna</span><span class="pull-right">{{$data->warna}}</span><br>
                    <span class="text-primary">Tahun</span><span class="pull-right">{{$data->tahun_keluar}}</span><br> 
                    </div>

                   <br>
                <!-- <span class="pull-right"><a href="{{ route('transaksibelis.create', $data->id) }}" class="btn btn-danger">Transaksi</a></span> --> <span class="pull-left"><a href="{{ route('motors.edit', $data->id) }}"  class="btn btn-success">Ubah</a> <a href="{{ route('motors.destroy', $data->id) }}"  class="btn btn-warning">Hapus</a></span> 
            </div>
        </div>
    </div>
@endforeach
</div>
    <!-- Column -->
 </div>
 <div class="row">
    <div class="col-sm 12">
        <div class="card">
            <div class="card-block">
           {{$motors->render()}}
            </div>
        </div>
    </div>
</div>
@endif

@endsection
