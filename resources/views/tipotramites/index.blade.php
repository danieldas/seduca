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
                   @if($errors->has('mensaje'))
                      <div class="alert alert-danger">
                        {{ $errors->first('mensaje') }}
                      </div>
                      @endif

                        {!! Form::open([
                            'route' => 'tipotramites.store', 
                            'files' => true,
                            ]) !!}

                            <br>
                            
                        @include('tipotramites.form')   
                        
                           
                        <div class="text-center">
                            <button type="submit" class="btn btn-primary">
                                <b class="fa fa-save"></b> Guardar
                            </button>
                            <a class="btn btn-danger" 
                                href="{{ route('folios.index')  }}" >
                                <b class="fa fa-close"></b> Salir
                            </a>
                        </div>
                        {!! Form::close() !!}

                    


                        <br>
                    <table class="table table-striped">
                        <thead class="thead-dark">
                            <tr>
                                <th>Nombre</th>
                                <th>Tiempo Aproximado</th>
                            
                                <th>Opciones</th>
                            </tr>
                        </thead>
                        <tbody>
                        @forelse($tramites as $tramite)
                            <tr>

                                <td>{{ $tramite->Nombre }}</td>
                                <td>{{ $tramite->TiempoAprox }}</td>
                          
                                <td>
   
                                   

                                    <a href="{{ route('tipotramites.show', 
                                        ['id' => $tramite->IdTipoTramite]) }}" 
                                    class="btn btn-sm btn-info" title="Ver">
                                        <b class="fa fa-eye"></b>
                                    </a>
                                    <a href="{{ route('tipotramites.edit', 
                                        ['IdTipoTramite' => $tramite->IdTipoTramite]) }}" 
                                        class="btn btn-sm btn-warning " title="Editar">
                                        <b class="fa fa-edit"></b>
                                    </a>
                                  

                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="3" class="text-center">No existen trámites</td>
                            </tr>
                        @endforelse
                        </tbody>
                    </table>    

                    </div>
                </div>
            </div>        
        </div>
    </div>
</div> 
@endsection
