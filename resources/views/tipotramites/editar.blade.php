@extends('plantillas.principal')
@section('contenido')
<div class="breadcrumbs">
    <div class="col-sm-4">
        <div class="page-header float-left">
            <div class="page-title">
                <h1>Trámites</h1>
            </div>
        </div>
    </div>        
    <div class="col-sm-8">
        <div class="page-header float-right">
            <div class="page-title">
                <ol class="breadcrumb text-right">
                    <li>Folio</li>
                    <li >Tipo Trámites</li>
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

                        {!! Form::model($tramite, [
                            'route' => ['tipotramites.update', $tramite->IdTipoTramite],
                            'method' => 'put',
                            'files' => true,
                            ]) !!}

                           

                            @include('tipotramites.form')  

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