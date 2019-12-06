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
                    <li><a href="{{ route('plantillas.principal') }}">Inicio</a></li>
                    <li >Solicitantes</li>
                    <li class="active">Lista</li>
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
                        <strong class="card-title">Lista</strong>
                    </div>
                    <div class="card-body">                

                    @if(session('mensaje'))
                    <div class="alert alert-success">
                        {{ session('mensaje') }}
                    </div>
                    @endif

                    @if(session('mensajeRojo'))
                    <div class="alert alert-danger">
                        {{ session('mensajeRojo') }}
                    </div>
                    @endif
                    <div class="form-group">
                           
                         
                        {!! Form::open([
                            'route' => 'solicitantes.index', 
                            'method' => 'get',
                            'class' => 'col-lg-10',
                            ]) !!}
                            <div class="input-group ">
                                <div class="col-lg-8">
                                {!! Form::text('buscar', old('', Request::input('buscar')), [
                                    'class' => 'form-control ',
                                    'placeholder' => 'Buscar por Carnet, Nombre, Teléfono...',
                                    ]) !!}
                                </div>
                                <div class="col-lg-2">
                                    {!! Form::select('estado',
                                     
                                        config('cmb.estados'), 
                                        old('', Request::input('estado')), 
                                        [
                                            'class' => 'form-control ',
                                        ]) 
                                    !!}
                                </div>
                                <span class="input-group-btn">
                                    <button type="submit" class="btn btn-success">
                                        <b class="fa fa-search"></b>
                                    </button>
                                </span>
                                <br><br>
                                <div class="col-lg-2">
                                    <a href="{{ route('solicitantes.registro') }}"  class="btn btn-primary">
                                        <b class="fa fa-plus" ></b> Agregar Solicitante
                                    </a> 
                                </div>
                            </div>
                        {!! Form::close() !!}
                    </div>
                    <table class="table table-striped">
                        <thead class="thead-dark">
                            <tr>
                                <th>Carnet</th>
                                <th>Nombre Completo</th>
                                <th>Teléfono</th>
                                <th>Tipo</th>
                                <th>Sexo</th>
                                <th>Opciones</th>
                            </tr>
                        </thead>
                        <tbody>
                        @forelse($solicitantes as $solicitante)
                            <tr>
                                
                                <td>{{ $solicitante->Ci }}</td>
                                <td>{{ $solicitante->NombreCompleto }}</td>
                                <td>{{ $solicitante->Telefono }}</td>
                                <td>{{ $solicitante->Tipo }}</td>
                                <td>{{ $solicitante->Sexo }}</td>
                                <td>
   
                                    @if($solicitante->Estado === 'Alta')

                                    <a href="{{ route('solicitantes.show', 
                                        ['id' => $solicitante->Ci]) }}" 
                                    class="btn btn-sm btn-info" title="Ver">
                                        <b class="fa fa-eye"></b>
                                    </a>
                                    <a href="{{ route('solicitantes.edit', 
                                        ['Ci' => $solicitante->Ci]) }}" 
                                        class="btn btn-sm btn-warning " title="Editar">
                                        <b class="fa fa-edit"></b>
                                    </a>
                                        <a href="{{ route('solicitantes.DarBaja', 
                                        ['Ci' => $solicitante->Ci]) }}" 
                                        class="btn btn-sm btn-danger " title="Dar Baja">
                                        <b class="fa fa-arrow-down"></b>
                                    </a>
                                    <a href="{{ route('solicitantes.registroFolio', 
                                        ['Ci' => $solicitante->Ci]) }}" 
                                        class="btn btn-sm btn-success " title="Folios">
                                        <b class="fa fa-folder"></b>
                                    </a>
                                    @elseif($solicitante->Estado === 'Baja')
                                    
                                    <a href="{{ route('solicitantes.DarAlta', 
                                        ['Ci' => $solicitante->Ci]) }}" 
                                        class="btn btn-sm btn-success " title="Dar Alta">
                                        <b class="fa fa-arrow-up"></b>
                                    </a>
                                       
                                    @endif

                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="3" class="text-center">No existen solicitantes</td>
                            </tr>
                        @endforelse
                        </tbody>
                    </table>    
                    </div>
                </div> <!-- .card -->
            </div>
                    <!--/.col-->                                            
        </div>

                {!! $solicitantes->appends([
                'buscar' => Request::input('buscar'),
                'estado' => Request::input('estado')
                ])->links() !!}

    </div><!-- .animated -->
</div><!-- .content -->
@endsection

