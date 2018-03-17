@extends('layouts.temp')

@section('content')
<div class="row">
    <!-- Column -->
    <div class="col-sm-12">
        <div class="card">
            <div class="card-block">
                <h4 class="card-title">Ubah Data Motor</h4>
                <div class="text-right">
                
                </div>
                    {!! Form::model($konsumen, ['url' => route('konsumens.update', $konsumen->id), 'method' => 'put', 'class' => 'form-horizontal']) !!}
                    @include('konsumens._form')
                    {!! Form::close() !!}
                </div>
        </div>
    </div>
</div>
@endsection
