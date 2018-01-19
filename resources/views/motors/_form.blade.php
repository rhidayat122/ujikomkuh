<div class="form-group{{ $errors->has('merk_motor') ? ' has-error': '' }}">
    {!! Form::label('merk_motor', 'Merk Motor', ['class' => 'col-md-2 control-label']) !!}

    <div class="col-md-4">
        {!! Form::text('merk_motor', null, ['class' => 'form-control']) !!}
        {!! $errors->first('merk_motor', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group{{ $errors->has('tahun_keluar') ? ' has-error': '' }}">
{!! Form::label('tahun_keluar', 'Tahun Keluar', ['class' => 'col-md-2 control-label']) !!}

    <div class="col-md-4">
        {!! Form::text('tahun_keluar', null, ['class' => 'form-control']) !!}
        {!! $errors->first('tahun_keluar', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group{{ $errors->has('no_stnk') ? ' has-error': '' }}">
{!! Form::label('no_stnk', 'Nomor Stnk', ['class' => 'col-md-2 control-label']) !!}

    <div class="col-md-4">
        {!! Form::text('no_stnk', null, ['class' => 'form-control']) !!}
        {!! $errors->first('no_stnk', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group{{ $errors->has('harga_beli') ? ' has-error': '' }}">
{!! Form::label('harga_beli', 'Harga Beli', ['class' => 'col-md-2 control-label']) !!}

    <div class="col-md-4">
        {!! Form::number('harga_beli', null, ['class' => 'form-control']) !!}
        {!! $errors->first('harga_beli', '<p class="help-block">:message</p>') !!}
    </div>
<div class="form-group{{ $errors->has('harga_jual') ? ' has-error': '' }}">
{!! Form::label('harga_jual', 'Harga Jual', ['class' => 'col-md-2 control-label']) !!}

    <div class="col-md-4">
        {!! Form::number('harga_jual', null, ['class' => 'form-control']) !!}
        {!! $errors->first('harga_jual', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group{{ $errors->has('warna') ? ' has-error': '' }}">
{!! Form::label('warna', 'Warna', ['class' => 'col-md-2 control-label']) !!}

    <div class="col-md-4">
        {!! Form::text('warna', null, ['class' => 'form-control']) !!}
        {!! $errors->first('warna', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group{{ $errors->has('gambar') ? ' has-error': '' }}">
    {!! Form::label('gambar', 'Gambar', ['class' => 'col-md-2 control-label']) !!}
    <div class="col-md-4">
        {!! Form::file('gambar', null, ['class' => 'form-control']) !!}
        @if (isset($motor) && $motor->gambar)
            <p>
                {!! Html::image(asset('img/'.$motor->gambar), null, ['class' => 'img-rounded img-responsive']) !!}
            </p>
        @endif
        {!! $errors->first('gambar', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group">
    <div class="col-md-4 col-md-offset-2">
        {!! Form::submit('Simpan', ['class' => 'btn btn-primary']) !!}
    </div>
</div>
