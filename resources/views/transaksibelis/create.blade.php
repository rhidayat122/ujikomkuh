@extends('layouts.temp')

@section('title')
List Motor
@endsection
@section('content')



<div class="row">
    <!-- Column -->
    <div class="col-sm-12">
        <div class="card">
            <div class="card-block">
                <h4 class="card-title">Tambah Data Motor</h4>
                <div class="text-right">
                
                </div>
               {!! Form::open(['url' => route('motors.store'), 'method' => 'post','files' => 'true', 'enctype' => 'multipart/form-data', 'class' => 'form-horizontal']) !!}
                    @include('motors._form')
                    {!! Form::close() !!}
               
            </div>
        </div>
    </div>
    <!-- Column -->
 </div>
@endsection
