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
                <h4 class="card-title">Ubah Data Motor</h4>
                <div class="text-right">
                
                </div>
                    {!! Form::model($motor, ['url' => route('motors.update', $motor->id), 'method' => 'put', 'class' => 'form-horizontal']) !!}
                    @include('motors._form')
                    {!! Form::close() !!}
                </div>
        </div>
    </div>
</div>
@endsection
