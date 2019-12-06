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
                    <li>Configuración</li>
                    <li >Trámites</li>
                    <li class="active">Detalle</li>
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
                        <strong class="card-title">Detalle</strong>
                    </div>
                    <div class="card-body"> 

                    @if(session('mensaje'))
                        <div class="alert alert-success">
                            {{ session('mensaje') }}
                        </div>
                    @endif

                        <table class="table table-bordered">
                        <tr>
                            <td><strong>Carnet</strong></td>
                            <td>{{ $tramite->IdTipoTramite }}</td>
                        </tr>
                        <tr>
                            <td><strong>Nombre</strong></td>
                            <td>{{ $tramite->Nombre }}</td>
                        </tr>
                        <tr>
                            <td><strong>Apellido Paterno</strong></td>
                            <td>{{ $tramite->TiempoAprox }}</td>
                        </tr>
                      
                    </table>
                    <td>    
                        <div class="text-center">

                            <a href="{{ route('tipotramites.edit', ['id' => $tramite->IdTipoTramite]) }}" 
                                class="btn btn-warning" >
                                <b class="fa fa-edit"></b> Editar
                            </a>
                


                            <a href="{{ route('tipotramites.index')  }}" 
                                class="btn btn-primary" >
                                <b class="fa fa-close"></b> Salir
                            </a>
                        </div>
                    </td>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection