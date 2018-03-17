<div class="form-group{{ $errors->has('nama') ? ' has-error': '' }}">
    {!! Form::label('name', 'Nama', ['class' => 'col-md-2 control-label']) !!}

    <div class="col-md-4">
        {!! Form::text('nama', null, ['class' => 'form-control']) !!}
        {!! $errors->first('nama', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group{{ $errors->has('alamat') ? ' has-error': '' }}">
    {!! Form::label('name', 'Alamat', ['class' => 'col-md-2 control-label']) !!}

    <div class="col-md-4">
        {!! Form::text('alamat', null, ['class' => 'form-control']) !!}
        {!! $errors->first('alamat', '<p class="help-block">:message</p>') !!}
    </div>
</div>


<div class="form-group{{ $errors->has('no_hp') ? ' has-error': '' }}">
    {!! Form::label('name', 'Nomor HP', ['class' => 'col-md-2 control-label']) !!}

    <div class="col-md-4">
        {!! Form::number('no_hp', null, ['class' => 'form-control']) !!}
        {!! $errors->first('no_hp', '<p class="help-block">:message</p>') !!}
    </div>
</div>


<div class="form-group{{ $errors->has('username') ? ' has-error': '' }}">
    {!! Form::label('name', 'Id', ['class' => 'col-md-2 control-label']) !!}

    <div class="col-md-4">
        {!! Form::text('id', null, ['class' => 'form-control']) !!}
        {!! $errors->first('id', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group{{ $errors->has('password') ? ' has-error': '' }}">
    {!! Form::label('name', 'Password', ['class' => 'col-md-2 control-label']) !!}

    <div class="col-md-4">
        {!! Form::password('password', null, ['class' => 'form-control']) !!}
        {!! $errors->first('password', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group">
    <div class="col-md-4 col-md-offset-2">
        {!! Form::submit('Simpan', ['class' => 'btn btn-primary']) !!}
    </div>
</div>