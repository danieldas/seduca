

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

@if($errors->has('ApPaterno'))
<div class="form-group has-error">
  <div class="help-block">
    <label class="alert-danger">{{ $errors->first('ApPaterno') }}</label>
  </div>
@else
<div class="form-group">
@endif
  <div class="col-lg-2">
  {!! Form::label('ApPaterno', 'Apellido Paterno:', ['class' => 'control-label']) !!}
  </div> 
  <div class="col-lg-8" >
  {!! Form::text('ApPaterno', null, ['class' => 'form-control', 'maxlength' => '30']) !!}
  </div>
  <br><br>
</div>

@if($errors->has('ApMaterno'))
<div class="form-group has-error">
  <div class="help-block">
    <label class="alert-danger">{{ $errors->first('ApMaterno') }}</label>
  </div>
@else
<div class="form-group">
@endif
  <div class="col-lg-2">
  {!! Form::label('ApMaterno', 'Apellido Materno:', ['class' => 'control-label']) !!}
  </div> 
  <div class="col-lg-8" >
  {!! Form::text('ApMaterno', null, ['class' => 'form-control', 'maxlength' => '30']) !!}
  </div>
  <br><br>
</div>

@if($errors->has('Telefono'))
<div class="form-group has-error">
  <div class="help-block">
    <label class="alert-danger">{{ $errors->first('Telefono') }}</label>
  </div>
@else
<div class="form-group">
@endif
  <div class="col-lg-2">
  {!! Form::label('Telefono', 'Teléfono:', ['class' => 'control-label']) !!}
  </div> 
  <div class="col-lg-8" >
  {!! Form::text('Telefono', null, ['class' => 'form-control', 'maxlength' => '9']) !!}
  </div>
  <br><br>
</div>

@if($errors->has('Tipo'))
<div class="form-group has-error">
  <div class="help-block">
    <label class="alert-danger">{{ $errors->first('Tipo') }}</label>
  </div>
@else
<div class="form-group">
@endif
  <div class="col-lg-2">
  {!! Form::label('Tipo', 'Tipo:', ['class' => 'control-label']) !!} 
  </div>
  <div class="col-lg-8" >
  {!! Form::select('Tipo',
   config('cmb.tiposolicitantes'),  old('', Request::input('Tipo')), 
      [     'class' => 'form-control ', ]) !!}
  </div>
  <br><br>
</div>


@if($errors->has('Sexo'))
<div class="form-group has-error">
  <div class="help-block">
    <label class="alert-danger">{{ $errors->first('Sexo') }}</label>
  </div>
@else
<div class="form-group">
@endif
  <div class="col-lg-2">
  {!! Form::label('Sexo', 'Sexo:', ['class' => 'control-label']) !!} 
  </div>
  <div class="col-lg-8" >
  {!! Form::select('Sexo',
   config('cmb.sexos'),  old('', Request::input('Sexo')), 
      [     'class' => 'form-control ', ]) !!}
  </div>
  <br><br>
</div>

