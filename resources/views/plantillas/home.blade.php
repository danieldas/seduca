@extends('plantillas.principal')
@section('contenido')

<div class="breadcrumbs">
    <div class="col-sm-4">
        <div class="page-header float-left">
            <div class="page-title">
                <h1>Inicio</h1>
            </div>
        </div>
    </div>        
    <div class="col-sm-8">
        <div class="page-header float-right">
            <div class="page-title">
                <ol class="breadcrumb text-right">
                    
                    <li class="active">Home</li>
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
                        <strong class="card-title">Arqueo de Caja</strong>
                    </div>
                    <div class="card-body">                

                    @if(session('mensaje'))
                        <div class="alert alert-success">
                            {{ session('mensaje') }}
                        </div>
                    @endif

                    <table class="table table-bordered">
                        <tr>
                            <td><strong>Deber</strong></td>
                            <td><strong>Haber</strong></td>
                       
                        </tr>
                        <tr>
                            <td>{{ number_format($DeberTotal, 2) }}</td>
                            <td>{{ number_format($HaberTotal, 2) }}</td>
                            
                        </tr>
                    </table>
                    <table class="table table-bordered">
                        <tr>
                            <td><strong>Diferencia</strong></td>
                            <td>
                                {!! Form::text('Diferencia', number_format($Diferencia, 2), ['readonly' => 'readonly', 'name'=>'Diferencia', 'id'=>'Diferencia', 'style'=>'font-weight: bold; width: 100%; border-width:0px; border:none;']) !!}

                                {!! Form::hidden('Diferencia1', $Diferencia, ['readonly' => 'readonly', 'name'=>'Diferencia1', 'id'=>'Diferencia1']) !!}
                                </td>
                        </tr>
                    </table>
                    <table class="table table-bordered">

                        <tr>
                            <td><strong>Caja Chica</strong></td>
                            <td><input type="number" name="Cheques" id="CajaChica" value="0" style="width: 100%; padding-left: 5px"></td>
                        </tr>
                        <tr>
                            <td><strong>Efectivo USD</strong></td>
                            <td><input type="number" name="EfectivoUsd" id="EfectivoUsd" value="0" style="width: 100%; padding-left: 5px"></td>
                        </tr>
                        <tr>
                            <td><strong>Efectivo Bs</strong></td>
                            <td><input type="number" name="EfectivoBs" id="EfectivoBs" value="0" style="width: 100%; padding-left: 5px"></td>
                        </tr>
                        <tr>
                            <td><strong>Cheques</strong></td>
                            <td><input type="number" name="Cheques" id="Cheques" value="0" style="width: 100%; padding-left: 5px"></td>
                        </tr>
                        <tr>
                            <td><strong>Total</strong></td>
                            <td><input name="Total" id="Total" value="0" style="font-weight: bold; width: 100%; border-width:0px; border:none;" readonly="readonly"></td>
                        </tr>
                    </table>
                    <table class="table table-bordered">
                        <tr>
                            <td><strong>Resultado</strong></td>
                            <td><input name="Resultado" id="Resultado" value="0" style="font-weight: bold; width: 100%; border-width:0px; border:none;" readonly="readonly"></td>
                        </tr>
                    </table>
                    <br><br>
                     <table class="table table-bordered">
                        <tr>
                            <thead><center><strong>INGRESOS Y GASTOS OPERATIVOS</strong></center></thead>
                        </tr>
                        <tr>
                            <td><strong></strong></td>
                            <td><strong>Deber</strong></td>
                            <td><strong>Haber</strong></td>
                            <td><strong>Total</strong></td>
                        </tr>
                        <tr>
                            <td><strong>Concentrado</strong></td>
                            <td>{{ number_format($ConcentradoCalculo->Perdida, 2) }}</td>
                            <td>{{ number_format($ConcentradoCalculo->Ganancia, 2) }}</td>
                            <td>{{ number_format($ConcentradoCalculo->Total, 2) }}</td>
                        </tr>
                        <tr>
                            <td><strong>Proceso</strong></td>
                            <td>{{ number_format($ProcesoCalculo->Perdida, 2) }}</td>
                            <td>{{ number_format($ProcesoCalculo->Ganancia, 2) }}</td>
                            <td>{{ number_format($ProcesoCalculo->Total, 2) }}</td>
                        </tr>
                        <tr>
                            <td><strong>Cuenta de Ajuste</strong></td>
                            <td>{{ number_format($Deber, 2) }}</td>
                            <td>{{ number_format($Haber, 2) }}</td>
                            <td>{{ number_format($AjusteCalculo, 2) }}</td>
                        </tr>
                        <tr>
                            <td><strong>Intereses</strong></td>
                            <td>{{ number_format($DeberInteres, 2) }}</td>
                            <td>{{ number_format($HaberInteres, 2) }}</td>
                            <td>{{ number_format($TotalInteres, 2) }}</td>
                        </tr>

                        <tr>
                            <td><strong>Capital de Operaciones</strong></td>
                            <td>{{ number_format($DeberCapital, 2) }}</td>
                            <td>{{ number_format($HaberCapital, 2) }}</td>
                            <td>{{ number_format($SaldoCapital, 2) }}</td>
                        </tr>
                    </table>

                    <br><br>
                    <table class="table table-bordered">
                        <tr>
                            <thead><center><strong>COMPRAS/VENTAS</strong></center></thead>
                        </tr>
                        
                        <tr>
                            <td><strong>Compra de Carga</strong></td>
                            <td>{{ number_format($CompraCarga, 2) }}</td>

                        </tr>
                        <tr>
                            <td><strong>Venta de Carga</strong></td>
                            <td>{{ number_format($VentaCarga, 2) }}</td>

                        </tr>
                    </table>
                    <br><br>
                    <center><strong>CAPITAL DE OPERACIONES</strong></center>
                    <table class="table table-bordered">
                        <thead >
                            <tr>
                                <th>Nombre</th>
                                <th>Deber</th>
                                <th>Haber</th>                                
                                <th>Total</th>
                                
                            </tr>
                        </thead>
                        <tbody>
                        @forelse($capitales as $capital)
                            <tr>
                                <td>{{ $capital->NombreCompleto }}</td>
                                <td>{{ number_format($capital->Deber, 2) }}</td>
                                <td>{{ number_format($capital->Haber, 2) }}</td>
                                <td>{{ number_format($capital->Saldo, 2) }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="3" class="text-center">No existen capitales de operaciones</td>
                            </tr>
                        @endforelse
                        </tbody>
                    </table>




                    <br><br>
                    <center><strong>PRÉSTAMOS</strong></center>
                    <table class="table table-bordered">
                        <thead >
                            <tr>
                                <th>Nombre</th>
                                <th>Deber</th>
                                <th>Haber</th>                                
                                <th>Total</th>
                                
                            </tr>
                        </thead>
                        <tbody>
                        @forelse($prestamos as $prestamo)
                            <tr>
                                <td>{{ $prestamo->NombreCompleto }}</td>
                                <td>{{ number_format($prestamo->Deber, 2) }}</td>
                                <td>{{ number_format($prestamo->Haber, 2) }}</td>
                                <td>{{ number_format($prestamo->Saldo, 2) }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="3" class="text-center">No existen préstamos</td>
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
<script src="{!! asset('js/jquery.min.js') !!}"></script>
<script type="text/javascript">
    function addCommas(nStr) {
    nStr += '';
    x = nStr.split('.');
    x1 = x[0];
    x2 = x.length > 1 ? '.' + x[1] : '';
    var rgx = /(\d+)(\d{3})/;
    while (rgx.test(x1)) {
            x1 = x1.replace(rgx, '$1' + ',' + '$2');
    }
    return x1 + x2;
}

function sumas() { 

    var value= parseFloat($('#CajaChica').val()) + parseFloat($('#EfectivoUsd').val())+ parseFloat($('#EfectivoBs').val())+ parseFloat($('#Cheques').val());
    value1 = value;
    value = addCommas(value);
        $("#Total").val(value);

    var res= parseFloat($('#Diferencia1').val()) - value1;
    res = addCommas(res);
        $("#Resultado").val(res);




 } 

$(document).ready(function() {
    
    $('input[name="CajaChica"]').on('change', function()
    {  
        sumas();
    });
    $('input[name="EfectivoUsd"]').on('change', function()
    {  
       sumas();

    });
    $('input[name="EfectivoBs"]').on('change', function()
    {  
       sumas();

    });
    $('input[name="Cheques"]').on('change', function()
    {  
       sumas();

    });

});
</script>

@endsection