<div class="form-group{{ $errors->has('name') ? ' has-error': '' }}">
    {!! Form::label('merk', 'Merk', ['class' => 'col-md-2 control-label']) !!}

    <div class="col-md-4">
        {!! Form::text('merk', null, ['class' => 'form-control']) !!}
        {!! $errors->first('merk', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group">
    <div class="col-md-4 col-md-offset-2">
        {!! Form::submit('Simpan', ['class' => 'btn btn-primary']) !!}
    </div>
</div>
