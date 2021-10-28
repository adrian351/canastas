@extends('layouts.private.escritorio.dashboard')
@section('contenido')
<title>@section('title', __('Editar pedido activo producción').' '.$pedido->num_pedido)</title>
<div class="card {{ empty($pedido->lid_de_ped_produc) ? config('app.color_card_warning') : config('app.color_card_primario') }} card-outline card-tabs position-relative bg-white">
  <div class="card-header p-1 border-bottom {{ empty($pedido->lid_de_ped_produc) ? config('app.color_bg_warning') : config('app.color_bg_primario') }}">
    <div class="float-right mr-5">
      @include('venta.pedido.pedido_activo.ven_pedAct_showFields.estatusProduccionHeader')
    </div>
    <h5>
      <strong>{{ __('Editar pedido producción') }}: </strong>
      @can('produccion.pedidoActivo.show')
        <a href="{{ route('produccion.pedidoActivo.show', Crypt::encrypt($pedido->id)) }}" class="text-white">{{ $pedido->num_pedido }}</a>
      @else
        {{ $pedido->num_pedido }}
      @endcan
      @include('venta.pedido.pedido_activo.ven_pedAct_showFields.entr_xprs_urg_foraneo_gratis')
    </h5>
  </div>
  <div class="ribbon-wrapper">
    <div class="ribbon {{ empty($pedido->lid_de_ped_produc) ? config('app.color_bg_warning') : config('app.color_bg_primario') }}"> 
      <small>{{ $pedido->num_pedido }}</small>
    </div>
  </div>
</div>
<div class="row">
  @can('produccion.pedidoActivo.edit')
    <div class="col-md-7">
      <div class="pad">
          <div class="card {{ config('app.color_card_primario') }} card-outline card-tabs position-relative bg-white">
            <div class="card-body">
              {!! Form::open(['route' => ['produccion.pedidoActivo.update', Crypt::encrypt($pedido->id)], 'method' => 'patch', 'id' => 'produccionPedidoActivoUpdate']) !!}
                @include('produccion.pedido.pedido_activo.pedAct_editFields')
              {!! Form::close() !!}
            </div>
          </div>
      </div>
    </div>
  @endcan
  @can('produccion.pedidoActivo.edit')
    @include('venta.pedido.pedido_activo.ven_pedAct_showFields.numeroDePedidoUnificado', ['alto' => 'height: 17.6em;'])
  @endcan
</div>

<div class="row">
  <div class="col-md-12">
    <div class="card">
      <div class="card-header p-1 border-bottom bg-dark">
        <h5 align="center">{{ __('Tarjetas de felicitación') }}</h5> 
      </div>
      <div class="card-body">
        <table  class="table table-hover" >
          <thead>
            <tr>
              <th scope="col">COD</th>
              <th scope="col">CANT</th>
              <th scope="col">TIPO</th>
              <th scope="col">MENSAJE</th>
              <th scope="col">IMAGEN</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($pedido->armados as $arm) 
              @foreach ($arm->direcciones as $dir)
                <tr>
                  <th scope="row">{{ $dir->cod }}</th>
                  <td>{{ $dir->cant }}</td>
                  <td>{{ $dir->tip_tarj_felic }}</td>
                  <td>{{ $dir->mens_dedic }}</td>
                  <td>
                    @if ($dir->tarj_dise_rut != null )
                    <div class="card" style="width: 1.5rem; float: left;">
                      {{-- <div class="col"><br/> --}}
                        {{-- <div class="card"> --}}
                            <a href="{{$dir->tarj_dise_rut.$dir->tarj_dise_nom }}" >
                              <img src="{{ $dir->tarj_dise_rut.$dir->tarj_dise_nom }}"  class="card-img-top" />
                            </a>  
                        {{-- </div>  --}}
                      {{-- </div> --}}
                    </div>
                    @endif
                  </td>
                </tr>
              @endforeach
            @endforeach
            </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
@include('produccion.pedido.pedido_activo.armado_activo.armAct_index')
@endsection