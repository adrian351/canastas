@extends('layouts.private.escritorio.dashboard')
@section('contenido')
<title>@section('title', __('Lista de pagos (Individual)'))</title>
<div class="card">
  <div class="card-header p-1">
    <ul class="nav nav-pills">
      @include('pago.pag_menu')
    </ul>
  </div>
  <div class="card-body">
    {!! Form::model(Request::all(), ['route' => 'pago.index', 'method' => 'GET']) !!}
      @include('global.buscador.buscador', ['ruta_recarga' => route('pago.index'), 'opciones_buscador' => config('opcionesSelect.select_pago_index')])
    {!! Form::close() !!}
    @include('pago.individual.ind_table')
    @include('global.paginador.paginador', ['paginar' => $pagos])
  </div>
  <hr>
    {{-- monto de cero --}}
  <br/>

  <center><h4>Pagos con monto de $0.00</h4></center>
  <br/>
  <div class="card-body table-responsive p-0" id="div-tabla-scrollbar" style="height: 40em;">
    <table class="table table-head-fixed table-hover table-striped table-sm table-bordered">
      @if(sizeof($pagos) == 0)
        @include('layouts.private.busquedaSinResultados')
      @else
  
      <thead>
          @include('pago.pag_table.th.codigoDeFacturacion')
          @include('pago.pag_table.th.folio')
          @include('pago.pag_table.th.cliente')
          @include('factura.fac_table.th.estatusFactura')
          @include('pago.pag_table.th.estatusPago')
          @include('pago.pag_table.th.formaDePago')
          @include('pago.pag_table.th.montoDePago')
          @include('pago.pag_table.th.numeroDePedido')
          <th colspan="3">&nbsp</th>
        </tr>
        
      </thead>
      
      <tbody> 
        @foreach($pagos as $pago)
        {{--  mostrar registros con monto menor o igual a $0  --}}
           @if($pago->mont_de_pag <= 0)
              <tr title="{{ $pago->cod_fact }}">
                @include('pago.pag_table.td.codigoDeFacturacion', ['show' => true, 'canany' => ['pago.show'], 'ruta' => 'pago.show', 'target' => null])
                @include('pago.pag_table.td.folio')
                @include('pago.pag_table.td.cliente')
                @include('factura.fac_table.td.estatusFactura', ['factura' => $pago])
                @include('pago.pag_table.td.estatusPago')
                @include('pago.pag_table.td.formaDePago')
                @include('pago.pag_table.td.montoDePago')
               
                @include('venta.pedido.pedido_activo.ven_pedAct_table.td.opcionShow', ['pedido' => $pago->pedido, 'canany' => ['rastrea.pedido.show', 'rastrea.pedido.showFull'], 'ruta' => route('rastrea.pedido.show', Crypt::encrypt($pago->pedido->id)), 'target' => '_blank'])
                @include('pago.individual.ind_tableOpciones')
                
              </tr>
            @else
  
  
          @endif
        @endforeach
      </tbody>
    @endif
    </table>
  </div>

</div>
@endsection