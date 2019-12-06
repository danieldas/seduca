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
                    <li><a href="{{ route('plantillas.principal') }}">Inicio</a></li>
                    <li >Unidad</li>
                    <li class="active">Asignación</li>
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
                        <strong class="card-title"> Asignar trabajador a {{ $unidad->Nombre}} </strong>
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

                    {!! Form::open([
                            'route' => 'unidades.storeAsignacion', 
                            'files' => true,
                            ]) !!}
                            <br>
                            @if($errors->has('FkUsuario'))
                            <div class="form-group has-error">
                              <div class="help-block">
                                <label class="alert-danger">{{ $errors->first('FkUsuario') }}</label>
                              </div>
                            @else
                            <div class="form-group">
                            @endif
                            <div class="col-lg-2">
                                {!! Form::label('Usuario', 'Trabajador:', [
                                    'class' => 'control-label'
                                ]) !!}
                            </div>
                                <div class="col-lg-7">
                                {!! Form::select('FkUsuario', $usuarios, null, [

                                    'class' => 'form-control',
                                    'id'=>'FkUsuario',
                                    'name'=>'FkUsuario',
                                    'placeholder' => 'Seleccione un trabajador',
                                    ]) !!}

                                </div>
                                  {!! Form::hidden('FkUnidad', $unidad->IdUnidad, ['class' => 'form-control', 'id' => 'FkUnidad' ]) !!}
<br><br>
                    <div class="text-center">
                            <button type="submit" class="btn btn-primary">
                                <b class="fa fa-save"></b> Guardar
                            </button>
                            <a class="btn btn-danger" 
                                href="{{ route('unidades.index') }}">
                                <b class="fa fa-close"></b> Salir
                            </a>
                           

                        </div>

                        {!! Form::close() !!}
                        <br><br>
                    <table class="table table-striped">
                        <thead class="thead-dark">
                            <tr>
                                
                                <th>Nombre</th>
                                <th>Cuenta</th>
                                <th>Ci</th>
                                <th>Opciones</th>
                            </tr>
                        </thead>
                        <tbody>
                        @forelse($asignaciones as $asignacion)
                            <tr>
                                
                          
                                <td>{{ $asignacion->NombreCompleto }}</td>
                                <td>{{ $asignacion->Cuenta }}</td>
                                <td>{{ $asignacion->Ci }}</td>
                                <td>                            
                                    
                                    <a href="{{ route('unidades.desasignar', 
                                        ['IdAsignacion' => $asignacion->IdAsignacion]) }}" 
                                        class="btn btn-sm btn-danger " title="Dar Baja">
                                        <b class="fa fa-trash-o"></b>
                                    </a>
                                    

                                 

                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="3" class="text-center">No existen asignaciones</td>
                            </tr>
                        @endforelse
                        </tbody>
                    </table> 
                    </div>
                </div> <!-- .card -->
            </div>
                    <!--/.col-->                                            
        </div>   
                 {!! $asignaciones->appends([
                'buscar' => Request::input('buscar')
                ])->links() !!}

    </div><!-- .animated -->
</div><!-- .content -->

@endsection