@extends('layouts.temp')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
        <div class="card">
                <div class="card-block">
            <ul class="breadcrumb">
                <li><a href="{{ url('/home') }}">Dashboard</a></li>
                <li><a href="{{ url('/admin/members') }}">Karyawan</a></li>
                <li class="active">Tambah Karyawan</li>
            </ul>
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h2 class="panel-title">Tambah Karyawan</h2>
                </div>

                <div class="panel-body">
                    {!! Form::open(['url' => route('members.store'), 'method' => 'post', 'files' => 'true', 'class' => 'form-horizontal']) !!}

                    @include('members._form')
                    {!! Form::close() !!}
                </div>
                </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection