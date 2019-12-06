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
                    <li><a href="{{ route('plantillas.principal') }}">Inicio</a></li>
                    <li >Usuarios</li>
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
                            'route' => 'usuarios.index', 
                            'method' => 'get',
                            'class' => 'col-lg-10',
                            ]) !!}
                            <div class="input-group ">
                                <div class="col-lg-8">
                                {!! Form::text('buscar', old('', Request::input('buscar')), [
                                    'class' => 'form-control ',
                                    'placeholder' => 'Buscar por Cuenta, Nombre, Apellido...',
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
                                    <a href="{{ route('usuarios.registro') }}"  class="btn btn-primary">
                                        <b class="fa fa-plus" ></b> Agregar Usuario
                                    </a> 
                                </div>
                            </div>
                        {!! Form::close() !!}
                    </div>
                    <table class="table table-striped">
                        <thead class="thead-dark">
                            <tr>
                                <th>Cuenta</th>
                                <th>Nombre</th>
                                <th>Apellidos</th>
                                <th>Carnet</th>
                                <th>Rol</th>
                                <th>Opciones</th>
                            </tr>
                        </thead>
                        <tbody>
                        @forelse($usuarios as $usuario)
                            <tr>
                                
                                <td>{{ $usuario->Cuenta }}</td>
                                <td>{{ $usuario->Nombre }}</td>
                                <td>{{ $usuario->Apellido }}</td>
                                <td>{{ $usuario->Ci }}</td>
                                <td>{{ $usuario->Rol }}</td>
                                <td>
   
                                    @if($usuario->Estado === 'Alta')

                                    <a href="{{ route('usuarios.show', 
                                        ['id' => $usuario->Cuenta]) }}" 
                                    class="btn btn-sm btn-info" title="Ver">
                                        <b class="fa fa-eye"></b>
                                    </a>
                                    <a href="{{ route('usuarios.edit', 
                                        ['Cuenta' => $usuario->Cuenta]) }}" 
                                        class="btn btn-sm btn-warning " title="Editar">
                                        <b class="fa fa-edit"></b>
                                    </a>
                                        <a href="{{ route('usuarios.DarBaja', 
                                        ['Cuenta' => $usuario->Cuenta]) }}" 
                                        class="btn btn-sm btn-danger " title="Dar Baja">
                                        <b class="fa fa-arrow-down"></b>
                                    </a>

                                    @elseif($usuario->Estado === 'Baja')
                                    
                                    <a href="{{ route('usuarios.DarAlta', 
                                        ['Cuenta' => $usuario->Cuenta]) }}" 
                                        class="btn btn-sm btn-success " title="Dar Alta">
                                        <b class="fa fa-arrow-up"></b>
                                    </a>
                                       
                                    @endif

                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="3" class="text-center">No existen usuarios</td>
                            </tr>
                        @endforelse
                        </tbody>
                    </table>    
                    </div>
                </div> <!-- .card -->
            </div>
                    <!--/.col-->                                            
        </div>

                {!! $usuarios->appends([
                'buscar' => Request::input('buscar'),
                'estado' => Request::input('estado')
                ])->links() !!}

    </div><!-- .animated -->
</div><!-- .content -->
@endsection

