@extends('perfil.perfil.per_per_index')
@section('contenidoPerfil')
{!! Form::open(['route' => 'perfil.update', 'method' => 'patch', 'id' => 'perfilUpdate', 'files' => true]) !!}
  @include('perfil.perfil.editar.per_per_editFields')
{!! Form::close() !!}
@endsection