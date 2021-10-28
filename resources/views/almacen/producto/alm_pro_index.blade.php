@extends('layouts.private.escritorio.dashboard') 
@section('contenido')
<title>@section('title', __('Lista de productos'))</title>
<div class="card">
  <div class="card-header p-1">
    <ul class="nav nav-pills">
      @include('almacen.producto.alm_pro_menu')
    </ul>
  </div>
  <div class="card-body">
    {!! Form::model(Request::all(), ['route' => 'almacen.producto.index', 'method' => 'GET']) !!}
      @include('global.buscador.buscador', ['ruta_recarga' => route('almacen.producto.index'), 'opciones_buscador' => config('opcionesSelect.select_producto_index')])
    {!! Form::close() !!}
    @include('almacen.producto.alm_pro_table')
    @include('global.paginador.paginador', ['paginar' => $productos])
  </div>
</div>
@endsection