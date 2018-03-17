@extends('layouts.temp')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-block">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h2 class="panel-title">Tambah Konsumen</h2>
                </div>

                <div class="panel-body">
                    {!! Form::open(['url' => route('konsumens.store'), 'method' => 'post', 'class' => 'form-horizontal']) !!}
                    @include('konsumens._form')
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
