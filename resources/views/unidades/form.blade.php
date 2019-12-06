

@if($errors->has('Nombre'))
<div class="form-group has-error">
  <div class="help-block">
    {{ $errors->first('Nombre') }}
  </div>
@else
<div class="form-group">
@endif
  <div class="col-lg-2"> 
  {!! Form::label('Nombre', 'Nombre:', ['class' => 'control-label']) !!}
  </div> 
  <div class="col-lg-8" >
  {!! Form::text('Nombre', null, ['class' => 'form-control']) !!}
  </div>
  <br><br>
</div>



