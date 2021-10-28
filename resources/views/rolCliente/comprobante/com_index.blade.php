@extends('layouts.private.escritorio.dashboard')
@section('contenido')
<title>@section('title', __('Lista de comprobantes'))</title>
  <div class="shadow-lg p-2 mb-3 bg-body rounded bg-info ">
    <center>
      <h5>
        <strong>{{ __('Comprobantes de entrega') }}</strong> 
      </h5>
    </center>
  </div>
    <div class="card">
      <div class="card-body">
      {!! Form::model(Request::all(), ['route' => 'rolCliente.comprobante.index', 'method' => 'GET']) !!}
          {{-- @include('global.buscador.buscador', ['ruta_recarga' => route('rolCliente.comprobante.index'), 'opciones_buscador' => config('opcionesSelect.select_cliente_pedido_index')]) --}}
          @include('global.buscador.buscador', ['num_pag' => 50, 'ruta_recarga' => route('rolCliente.comprobante.index'), 'opciones_buscador' => config('opcionesSelect.select_comprobante_index')])
      {!! Form::close() !!}
      @include('rolCliente.comprobante.com_table')
      @include('global.paginador.paginador', ['paginar' => $pedidos])
    </div>
  </div>

@endsection