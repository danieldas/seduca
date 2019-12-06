@extends('plantillas.principal')
@section('contenido')
<div class="breadcrumbs">
    <div class="col-sm-4">
        <div class="page-header float-left">
            <div class="page-title">
                <h1>Unidad</h1>
            </div>
        </div>
    </div>        
    <div class="col-sm-8">
        <div class="page-header float-right">
            <div class="page-title">
                <ol class="breadcrumb text-right">
                    <li>Configuración</li>
                    <li >Unidad</li>
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
                            <td><strong>Id</strong></td>
                            <td>{{ $unidad->IdUnidad }}</td>
                        </tr>
                        <tr>
                            <td><strong>Nombre</strong></td>
                            <td>{{ $unidad->Nombre }}</td>
                        </tr>
                       

                        <tr>
                            <td><strong>Estado</strong></td>
                            <td>{{ $unidad->Estado }}</td>
                        </tr>
                    </table>
                    <td>    
                        <div class="text-center">
                        
                            @if($unidad->Estado === 'Alta')
                                <a href="{{ route('unidades.DarBaja', 
                                    ['IdUnidad' => $unidad->IdUnidad])  }}" 
                                    class="btn btn-danger " title="Dar Baja">
                                    <b class="fa fa-arrow-down"></b>Dar Baja
                                </a>

                            @elseif($unidad->Estado === 'Baja')
                                <a href="{{ route('unidades.DarAlta', 
                                    ['IdUnidad' => $unidad->IdUnidad]) }}" 
                                    class="btn btn-success " title="Dar Alta">
                                    <b class="fa fa-arrow-up"></b>Dar Alta
                                </a>
                            @endif


                        <a href="{{ route('unidades.edit', ['IdUnidad' => $unidad->IdUnidad]) }}" 
                            class="btn btn-warning" >
                            <b class="fa fa-edit"></b> Editar
                        </a>
    
                        <a href="{{ route('unidades.index') }}" 
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