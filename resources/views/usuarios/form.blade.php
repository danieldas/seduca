

@if($errors->has('Nombre'))
<div class="form-group has-error">
  <div class="help-block">
    <label class="alert-danger">{{ $errors->first('Nombre') }}</label>
  </div>
@else
<div class="form-group">
@endif
  <div class="col-lg-2">
  {!! Form::label('Nombre', 'Nombre:', ['class' => 'control-label']) !!} 
  </div>
  <div class="col-lg-8" >
  {!! Form::text('Nombre', null, ['class' => 'form-control', 'maxlength' => '50']) !!}
  </div>
  <br><br>
</div>

@if($errors->has('Apellido'))
<div class="form-group has-error">
  <div class="help-block">
    <label class="alert-danger">{{ $errors->first('Apellido') }}</label>
  </div>
@else
<div class="form-group">
@endif
  <div class="col-lg-2">
  {!! Form::label('Apellido', 'Apellidos:', ['class' => 'control-label']) !!} 
  </div>
  <div class="col-lg-8" >
  {!! Form::text('Apellido', null, ['class' => 'form-control', 'maxlength' => '50']) !!}
  </div>
  <br><br>
</div>

@if($errors->has('Ci'))
<div class="form-group has-error">
  <div class="help-block">
    <label class="alert-danger">{{ $errors->first('Ci') }}</label>
  </div>
@else
<div class="form-group">
@endif
  <div class="col-lg-2">
  {!! Form::label('Ci', 'Carnet:', ['class' => 'control-label']) !!} 
  </div>
  <div class="col-lg-8" >
  {!! Form::text('Ci', null, ['class' => 'form-control', 'maxlength' => '50']) !!}
  </div>
  <br><br>
</div>


@if($errors->has('Rol'))
<div class="form-group has-error">
  <div class="help-block">
    <label class="alert-danger">{{ $errors->first('Rol') }}</label>
  </div>
@else
<div class="form-group">
@endif
  <div class="col-lg-2">
  {!! Form::label('Rol', 'Rol:', ['class' => 'control-label']) !!} 
  </div>
  <div class="col-lg-8" >
  {!! Form::select('Rol',
   config('cmb.usuarios'),  old('', Request::input('Rol')), 
      [     'class' => 'form-control ', ]) !!}
  </div>
  <br><br>
</div>

