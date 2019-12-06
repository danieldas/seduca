@extends('plantillas.principal')
@section('contenido')
<div class="breadcrumbs">
    <div class="col-sm-4">
        <div class="page-header float-left">
            <div class="page-title">
                <h1>Solicitantes</h1>
            </div>
        </div>
    </div>        
    <div class="col-sm-8">
        <div class="page-header float-right">
            <div class="page-title">
                <ol class="breadcrumb text-right">
                    <li>Trámites</li>
                    <li >Solicitantes</li>
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

                        {!! Form::model($solicitante, [
                            'route' => ['solicitantes.update', $solicitante->Ci],
                            'method' => 'put',
                            'files' => true,
                            ]) !!}

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
                              {!! Form::text('Ci', null, ['class' => 'form-control', 'readonly' => 'readonly']) !!}
                              </div>
                              <br><br>
                            </div>

                            @include('solicitantes.form')  

            				<div class="text-center">
            					<button type="submit" class="btn btn-primary">
            						<b class="fa fa-save"></b> Guardar
            					</button>
            					<a class="btn btn-danger" 
            						href="{{ route('solicitantes.index')  }}" >
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