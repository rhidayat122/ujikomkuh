@extends('layouts.temp')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-block">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h2 class="panel-title">Tambah Merk</h2>
                </div>

                <div class="panel-body">
                    {!! Form::open(['url' => route('merks.store'), 'method' => 'post', 'class' => 'form-horizontal']) !!}
                    @include('merks._form')
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
