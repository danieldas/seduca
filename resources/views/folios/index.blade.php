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
                    <li><a href="{{ route('plantillas.principal') }}">Inicio</a></li>
                    <li >Folios</li>
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
                            'route' => 'folios.index', 
                            'method' => 'get',
                            'class' => 'col-lg-10',
                            ]) !!}
                            <div class="input-group ">
                                <div class="col-lg-8">
                                {!! Form::text('buscar', old('', Request::input('buscar')), [
                                    'class' => 'form-control ',
                                    'placeholder' => 'Buscar por Solicitante, Carnet, Trámite...',
                                    ]) !!}
                                </div>
                                <div class="col-lg-2">
                                    {!! Form::select('estado',
                                     
                                        config('cmb.estadofolios'), 
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
                                    <a href="{{ route('tipotramites.index') }}"  class="btn btn-primary">
                                        <b class="fa fa-plus" ></b> Agregar tipo trámite
                                    </a> 
                                </div>
                            </div>
                        {!! Form::close() !!}
                    </div>
                    <table class="table table-striped">
                        <thead class="thead-dark">
                            <tr>
                                <th>Fecha</th>
                                <th>Observacion</th>
                                <th>Trámite</th>                                
                                <th>Carnet</th>
                                <th>Solicitante</th>
                                <th>Opciones</th>
                            </tr>
                        </thead>
                        <tbody>
                        @forelse($folios as $folio)
                            <tr>
                                <td>{{ $folio->Fecha }}</td>
                                <td>{{ $folio->Observacion }}</td>
                                <td>{{ $folio->NombreTramite }}</td>
                                <td>{{ $folio->Ci }}</td>
                                <td>{{ $folio->NombreCompleto }}</td>
                                
                                
                                <td>
   
                                   

                                    <a href="{{ route('folios.show', 
                                        ['id' => $folio->IdFolio]) }}" 
                                    class="btn btn-sm btn-info" title="Ver">
                                        <b class="fa fa-eye"></b>
                                    </a>
                                    <a href="{{ route('folios.edit', 
                                        ['IdFolio' => $folio->IdFolio]) }}" 
                                        class="btn btn-sm btn-warning " title="Editar">
                                        <b class="fa fa-edit"></b>
                                    </a>
                                    <a class="btn btn-sm btn-danger " title="Eliminar" data-toggle="modal" href="#" 
                                    data-txtid="{{$folio->IdFolio}}" 
                                    data-txttramite="{{$folio->NombreTramite}}"
                                    data-txtfecha="{{$folio->Fecha}}"
                                    data-txtnombre="{{$folio->NombreCompleto}}" 
                
                                     data-target="#miModal"> <b class="fa fa-trash-o"></b></a>
                                       
                              

                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="text-center">No existen folios</td>
                            </tr>
                        @endforelse
                        </tbody>
                    </table>    
                    </div>
                </div> <!-- .card -->
            </div>
                    <!--/.col-->                                            
        </div>

                {!! $folios->appends([
                'buscar' => Request::input('buscar'),
                'estado' => Request::input('estado')
                ])->links() !!}

    </div><!-- .animated -->
</div><!-- .content -->


<div class="modal fade" id="miModal" tabindex="-20" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header" style="background-color: #c62828;">
                
                <h4 class="modal-title" id="myModalLabel" style="color: white">Eliminar folio</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                
                <table class="table table-bordered">

                <tr>
                    <td><strong>Fecha</strong></td>
                    <td><input style="border: 0; background-color:white" readonly class="form-control" name="fecha" id="fecha"></td>
                </tr>
        
                <tr>
                    <td><strong>Solicitante</strong></td>
                    <td><input style="border: 0; background-color:white" readonly class="form-control" name="nombre" id="nombre"></td>                    
                </tr>

                <tr>
                    <td><strong>Trámite</strong></td>
                    <td><input style="border: 0; background-color:white" readonly class="form-control" name="tramite" id="tramite"></td>
                    
                </tr>
  
                             
                </table>
                <h6>Ingrese su password para poder eliminar el folio </h6>

                {!! Form::open([
                    'route' => 'folios.EliminarFolio', 
                    'files' => true,
                ]) !!}
                          
                    {!! Form::hidden('IdFolio', null, ['class' => 'form-control', 'name'=>'id', 'id'=>'id']) !!}
                    {!! Form::hidden('IdFolio', Auth::user()->Cuenta, ['class' => 'form-control', 'name'=>'Cuenta', 'id'=>'Cuenta']) !!}
                    <br>
                                @if($errors->has('Password'))
                                <div class="form-group has-error">
                                  <div class="help-block">
                                    {{ $errors->first('Password') }}
                                  </div>
                                @else
                                <div class="form-group">
                                @endif
                                  <div class="col-lg-3">
                                  {!! Form::label('Password', 'Password:', ['class' => 'control-label']) !!} 
                                  </div>
                                  <div class="col-lg-7" >
                                  {!! Form::password('Password', null, ['class' => 'form-control']) !!}
                                  </div>
                                  <br><br>
                                </div>
                              
                            <div class="text-center">
                                <button type="submit" class="btn btn-danger">
                                    <b class="fa fa-trash-o"></b> Eliminar
                                </button>
                          
                            </div>
                    {!! Form::close() !!}


            </div>
        </div>
    </div>
</div>
<script src="{{ asset('js/app.js') }}"></script>
<script>  
  $('#miModal').on('show.bs.modal', function (event) {
      var button = $(event.relatedTarget) 
      var id = button.data('txtid') 
      var nombre = button.data('txtnombre') 
      var tramite = button.data('txttramite') 
      var fecha = button.data('txtfecha') 


      var modal = $(this)
      modal.find('.modal-body #id').val(id);
      modal.find('.modal-body #nombre').val(nombre);
      modal.find('.modal-body #tramite').val(tramite);
      modal.find('.modal-body #fecha').val(fecha);

})

</script>

@endsection

