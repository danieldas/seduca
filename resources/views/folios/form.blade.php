

@if($errors->has('Observacion'))
<div class="form-group has-error">
  <div class="help-block">
    <label class="alert-danger">{{ $errors->first('Observacion') }}</label>
  </div>
@else
<div class="form-group">
@endif
  <div class="col-lg-2">
  {!! Form::label('Observacion', 'Observación:', ['class' => 'control-label']) !!}
  </div> 
  <div class="col-lg-8" >
  {!! Form::text('Observacion', null, ['class' => 'form-control', 'maxlength' => '200']) !!}
  </div>
  <br><br>
</div>

@if($errors->has('Referencia'))
<div class="form-group has-error">
  <div class="help-block">
    <label class="alert-danger">{{ $errors->first('Referencia') }}</label>
  </div>
@else
<div class="form-group">
@endif
  <div class="col-lg-2">
  {!! Form::label('Referencia', 'Referencia:', ['class' => 'control-label']) !!}
  </div> 
  <div class="col-lg-8" >
  {!! Form::text('Referencia', null, ['class' => 'form-control', 'maxlength' => '100']) !!}
  </div>
  <br><br>
</div>

@if($errors->has('FkTipoTramite'))
<div class="form-group has-error">
  <div class="help-block">
    <label class="alert-danger">{{ $errors->first('FkTipoTramite') }}</label>
  </div>
@else
<div class="form-group">
@endif
<div class="col-lg-2">
    {!! Form::label('TipoTramite', 'Trámite:', [
        'class' => 'control-label'
    ]) !!}
</div>
    <div class="col-lg-8" >
    {!! Form::select('FkTipoTramite', $tramites, null, [

        'class' => 'form-control',
        'id'=>'FkTipoTramite',
        'name'=>'FkTipoTramite',
        'placeholder' => 'Seleccione un trámite',
        ]) !!}
</div>
  <br><br>
</div>