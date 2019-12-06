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
                    <li class="active">Editar</li>
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
                        <strong class="card-title">Editar</strong>
                    </div>
                    <div class="card-body">  

            {!! Form::model($usuario, [
                'route' => ['usuarios.updatePass', $usuario->Cuenta],
                'method' => 'put',
                'files' => true,
                ]) !!}

                @if($errors->has('password'))
                <div class="form-group has-error">
                  <div class="help-block">
                    {{ $errors->first('password') }}
                  </div>
                @else
                <div class="form-group">
                @endif
                  {!! Form::label('Password', 'Password', ['class' => 'control-label col-lg-2']) !!} 
                  <div class="col-lg-10" >
                  {!! Form::password('password', ['class' => 'form-control']) !!}
                  </div>
                  <br><br>
                </div>

                @if($errors->has('password'))
                <div class="form-group has-error">
                  <div class="help-block">
                    {{ $errors->first('password') }}
                  </div>
                @else
                <div class="form-group">
                @endif
                  {!! Form::label('password_confirmation', 'Repita su password', ['class' => 'control-label col-lg-2']) !!}  
                  <div class="col-lg-10" >
                  {!! Form::password('password_confirmation', ['class' => 'form-control']) !!}
                  </div>
                  <br><br>
                </div>

				<div class="text-center">
					<button type="submit" class="btn btn-primary">
						<b class="fa fa-save"></b> Guardar
					</button>
					<a class="btn btn-danger " 
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