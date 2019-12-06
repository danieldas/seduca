

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
  {!! Form::text('Nombre', null, ['class' => 'form-control', 'maxlength' => '70']) !!}
  </div>
  <br><br>
</div>

@if($errors->has('TiempoAprox'))
<div class="form-group has-error">
  <div class="help-block">
    <label class="alert-danger">{{ $errors->first('TiempoAprox') }}</label>
  </div>
@else
<div class="form-group">
@endif
  <div class="col-lg-2">
  {!! Form::label('TiempoAprox', 'Tiempo Aproximado:', ['class' => 'control-label']) !!}
  </div> 
  <div class="col-lg-8" >
  {!! Form::text('TiempoAprox', null, ['class' => 'form-control', 'maxlength' => '3']) !!}
  </div>
  <br><br>
</div>


