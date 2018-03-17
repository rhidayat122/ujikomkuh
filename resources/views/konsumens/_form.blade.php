<div class="form-group{{ $errors->has('nama') ? ' has-error': '' }}">
 
      {!! Form::label('name', 'Nama', ['class' => 'col-md-2 control-label']) !!}
 <div class="col-md-4">
        {!! Form::text('nama', null, ['class' => 'form-control']) !!}
        {!! $errors->first('nama', '<p class="help-block">:message</p>') !!}
    </div>
</div>

	<div class="form-group{{ $errors->has('jenis_kelamin') ? ' has-error': '' }}">
    {!! Form::label('name', 'Jenis Kelamin', ['class' => 'col-md-2 control-label']) !!}
		<div class="col-md-4">
			<input type="radio" name="jenis_kelamin" value="Laki-Laki" required=""><label>Laki-laki &nbsp;</label>
			<input type="radio" name="jenis_kelamin" value="Perempuan" required=""><label>Perempuan</label>
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
<div class="form-group{{ $errors->has('no_ktp') ? ' has-error': '' }}">
    {!! Form::label('name', 'Nomor KTP', ['class' => 'col-md-2 control-label']) !!}

    <div class="col-md-4">
        {!! Form::number('no_ktp', null, ['class' => 'form-control']) !!}
        {!! $errors->first('no_ktp', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group{{ $errors->has('status') ? ' has-error': '' }}">
    {!! Form::label('name', 'Status', ['class' => 'col-md-2 control-label']) !!}
		<div class="col-md-4">
			<input type="radio" name="status" value="Belum Nikah" required=""><label>Belum Nikah &nbsp;</label>
			<input type="radio" name="status" value="Nikah" required=""><label>Nikah</label>
		</div>
	</div>



<div class="form-group">
    <div class="col-md-4 col-md-offset-2">
        {!! Form::submit('Simpan', ['class' => 'btn btn-primary']) !!}
    </div>
</div>