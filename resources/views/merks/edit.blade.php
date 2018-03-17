@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <ul class="breadcrumb">
                <li><a href="{{ url('/home') }}">Dashboard</a></li>
                <li><a href="{{ url('/admin/authors') }}">Merk</a></li>
                <li class="active">Ubah Merk</li>
            </ul>
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h2 class="panel-title">Ubah Merk</h2>
                </div>

                <div class="panel-body">
                    {!! Form::model($merk, ['url' => route('merks.update', $merk->id), 'method' => 'put', 'class' => 'form-horizontal']) !!}
                    @include('merks._form')
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
