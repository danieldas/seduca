@extends('plantillas.principal')
@section('contenido')
<div class="breadcrumbs">
    <div class="col-sm-4">
        <div class="page-header float-left">
            <div class="page-title">
                <h1>Folios</h1>
            </div>
        </div>
    </div>        
    <div class="col-sm-8">
        <div class="page-header float-right">
            <div class="page-title">
                <ol class="breadcrumb text-right">
                    <li>Solicitantes</li>
                    <li >Folios</li>
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
                    @if(session('mensaje'))
                    <div class="alert alert-success">
                        {{ session('mensaje') }}
                    </div>
                    @endif

                        {!! Form::open([
                            'route' => 'solicitantes.storeFolio', 
                            'files' => true,
                            ]) !!}
                        <br>
                              {!! Form::hidden('FkSolicitante', $Ci, ['class' => 'form-control', 'maxlength' => '10']) !!}
                           
                            
                        @include('folios.form')   
                        
                           
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

<br>
                        <table class="table table-striped">
                        <thead class="thead-dark">
                            <tr>
                                <th>Observación</th>
                                <th>Estado</th>
                                <th>Fecha</th>
                                <th>Referencia</th>
                                <th>Tipo Trámite</th>
                                
                            </tr>
                        </thead>
                        <tbody>
                        @forelse($folios as $folio)
                            <tr>
                                
                                <td>{{ $folio->Observacion}}</td>
                                <td>{{ $folio->Estado }}</td>
                                <td>{{ $folio->Fecha }}</td>
                                <td>{{ $folio->Referencia }}</td>
                                <td>{{ $folio->Tramite }}</td>
                                
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center">No existen folios</td>
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
