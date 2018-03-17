@extends('layouts.temp')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
        <div class="card">
                <div class="card-block">
            
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h2 class="panel-title">Merk</h2>
                </div>

                <div class="panel-body">
                    <p><a class="btn btn-primary" href="{{ route('merks.create') }}">Tambah</a></p>
                    {!! $html->table(['class' => 'table table-striped']) !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
    {!! $html->scripts() !!}
@endsection
