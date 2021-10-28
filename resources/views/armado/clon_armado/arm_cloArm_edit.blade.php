@extends('layouts.private.escritorio.dashboard')
@section('contenido')
<title>@section('title', __('Editar armado clonado').' '.$armado->nom)</title>
<div class="card {{ config('app.color_card_primario') }} card-outline card-tabs position-relative bg-white">
  <div class="card-header p-1 border-bottom {{ config('app.color_bg_primario') }}">
    <h5>
      <strong>{{ __('Editar registro') }}: </strong>
      @can('armado.clon.show')
        <a href="{{ route('armado.clon.show', Crypt::encrypt($armado->id)) }}" class="text-white">{{ $armado->nom }}</a>
      @else
        {{ $armado->nom }}
      @endcan
    </h5>
  </div>
  <div class="ribbon-wrapper">
    <div class="ribbon {{ config('app.color_bg_primario') }}"> 
      <small>{{ $armado->id }}</small>
    </div>
  </div>
</div>
@can('armado.clon.edit')
  @include('armado.imagenes_armado.arm_imgArm_index')
  <div class="card {{ config('app.color_card_primario') }} card-outline card-tabs position-relative bg-white">
    <div class="card-body">
      {!! Form::open(['route' => ['armado.clon.update', Crypt::encrypt($armado->id)], 'method' => 'patch', 'id' => 'armadoClonUpdate', 'files' => true]) !!}
        @include('armado.arm_editFields')
        <div class="row">
            <div class="form-group col-sm btn-sm" >
              <a href="{{ route('armado.clon.index') }}" class="btn btn-default w-50 p-2 border"><i class="fas fa-sign-out-alt text-dark"></i> {{ __('Regresar') }}</a>
            </div>
            <div class="form-group col-sm btn-sm">
              <button type="submit" id="btnsubmit" class="btn btn-info w-100 p-2" onclick="return check('btnsubmit', 'armadoClonUpdate', '¡Alerta!', '¿Estás seguro quieres actualizar el registro?', 'info', 'Continuar', 'Cancelar', 'false');"><i class="fas fa-edit text-dark"></i> {{ __('Actualizar') }}</button>
            </div>
          </div>
      {!! Form::close() !!}
    </div>
  </div>
@endcan
@include('armado.clon_armado.producto_armado.arm_cloArm_proArm_index')
@endsection