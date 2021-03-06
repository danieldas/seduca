@extends('plantillas.principal')
@section('contenido')
<div class="breadcrumbs">
    <div class="col-sm-4">
        <div class="page-header float-left">
            <div class="page-title">
                <h1>Usuarios</h1>
            </div>
        </div>
    </div>        
    <div class="col-sm-8">
        <div class="page-header float-right">
            <div class="page-title">
                <ol class="breadcrumb text-right">
                    <li>Configuración</li>
                    <li >Usuarios</li>
                    <li class="active">Agregar</li>
                </ol>
            </div>
        </div>
    </div>
</div>

<div class="content mt-3">
    <div class="animated fadeIn">
            
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <strong class="card-title">Agregar</strong>
                    </div>
                    <div class="card-body"> 
                        @if($errors->has('registro'))
                      <div class="alert alert-danger">
                        {{ $errors->first('registro') }}
                      </div>
                      @endif
                      
                        {!! Form::open([
        					'route' => 'usuarios.store', 
        					'files' => true,
        					]) !!}
        				

                        @if($errors->has('Cuenta'))
                        <div class="form-group has-error">
                          <div >
                           <label class="alert-danger">{{ $errors->first('Cuenta') }}</label> 
                          </div>
                        @else
                        <div class="form-group">
                        @endif
                        <div class="col-lg-2">
                          {!! Form::label('Cuenta', 'Cuenta:', ['class' => 'control-label']) !!}  
                        </div>
                          <div class="col-lg-8" >
                          {!! Form::text('Cuenta', null, ['class' => 'form-control', 'id' => 'Cuenta', 'maxlength' => '20' ]) !!}

                          </div>
                          <br><br>
                        </div>


                        @if($errors->has('password'))
                        <div class="form-group has-error">
                          <div class="help-block">
                            <label class="alert-danger">{{ $errors->first('password') }}</label>
                          </div>
                        @else
                        <div class="form-group">
                        @endif
                          <div class="col-lg-2">
                          {!! Form::label('password', 'Password:', ['class' => 'control-label']) !!} 
                          </div>
                          <div class="col-lg-8" >
                          {!! Form::text('password', null, ['class' => 'form-control', 'maxlength' => '100']) !!}
                          </div>
                          <br><br>
                        </div>

                        @include('usuarios.form') 
                           
        				<div class="text-center">
        					<button type="submit" class="btn btn-primary">
        						<b class="fa fa-save"></b> Guardar
        					</button>
        					<a class="btn btn-danger" 
        						href="{{ route('usuarios.index') }}">
        						<b class="fa fa-close"></b> Salir
        					</a>
        				</div>
        			    {!! Form::close() !!}

                    </div>
                </div>
            </div>        
        </div>
    </div>
</div>
@endsection
