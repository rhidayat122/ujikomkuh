@extends('layouts.temp')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-block">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h2 class="panel-title">Tambah Kategori</h2>
                </div>

                <div class="panel-body">
                    {!! Form::open(['url' => route('kategoris.store'), 'method' => 'post', 'class' => 'form-horizontal']) !!}
                    @include('kategoris._form')
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
