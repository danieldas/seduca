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
                            <td>{{ $solicitante->Ci }}</td>
                        </tr>
                        <tr>
                            <td><strong>Nombre</strong></td>
                            <td>{{ $solicitante->Nombre }}</td>
                        </tr>
                        <tr>
                            <td><strong>Apellido Paterno</strong></td>
                            <td>{{ $solicitante->ApPaterno }}</td>
                        </tr>
                        <tr>
                            <td><strong>Apellido Materno</strong></td>
                            <td>{{ $solicitante->ApMaterno }}</td>
                        </tr>
                        <tr>
                            <td><strong>Teléfono</strong></td>
                            <td>{{ $solicitante->Telefono }}</td>
                        </tr>
                        <tr>
                            <td><strong>Tipo</strong></td>
                            <td>{{ $solicitante->Tipo }}</td>
                        </tr>
                        <tr>
                            <td><strong>Sexo</strong></td>
                            <td>{{ $solicitante->Sexo }}</td>
                        </tr>
                    </table>
                    <td>    
                        <div class="text-center">
                        
                            @if($solicitante->Estado === 'Alta')
                                <a href="{{ route('solicitantes.DarBaja', 
                                    ['Ci' => $solicitante->Ci])  }}" 
                                    class="btn btn-danger " title="Dar Baja">
                                    <b class="fa fa-arrow-down"></b>Dar Baja
                                </a>

                            @elseif($solicitante->Estado === 'Baja')
                                <a href="{{ route('solicitantes.DarAlta', 
                                    ['Ci' => $solicitante->Ci]) }}" 
                                    class="btn btn-success " title="Dar Alta">
                                    <b class="fa fa-arrow-up"></b>Dar Alta
                                </a>
                            @endif


                        <a href="{{ route('solicitantes.edit', ['Ci' => $solicitante->Ci]) }}" 
                            class="btn btn-warning" >
                            <b class="fa fa-edit"></b> Editar
                        </a>
            


                        <a href="{{ route('solicitantes.index')  }}" 
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