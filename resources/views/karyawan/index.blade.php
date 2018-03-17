@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
    <br>
    <br>
    <br><br><br>
        <div class="col-md-8 col-md-offset-3">
        
        <ul class="breadcrumb">
                <li><a href="{{ url('/home') }}">Dashboard</a></li>
                <li class="active">Karyawan</li>
            </ul>
            
            
            <div class="panel panel-info">
                <div class="panel-heading">
                    <h2 class="panel-title">Karyawan</h2>
                </div>

                <div class="panel-body">
                    
                   
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