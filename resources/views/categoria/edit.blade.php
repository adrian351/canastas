@extends('layouts.private.escritorio.dashboard')
@section('contenido')
<title>Editar Categoria</title>
<h1>Editar Categoria</h1>
<br>
<div>
    {{--  {{ route('categoria.create')}}  --}}
    <a type="submit" class="btn btn-success col-1.5 w-20 p-2 border" 
    href="{{ route('categoria.store')}}">
    <i class="fas fa-list"></i>   
    Lista de Categorias
    </a>
</div>
<br/>
{{--    --}}
<form action="{{ route('categoria.update',  $categoria->id)}}" autocomplete="off" method="POST">
    @method('PUT')
    @csrf
    <div class="row">
        <div class="form-group col-sm btn-sm">
            <label for="exampleInputEmail1">Nombre</label>
            <input type="text" class="form-control" id="categoria" name="categoria" aria-describedby="emailHelp" placeholder="" value="{{ old('categoria', $categoria->categoria) }}">
        </div>
        <div class="form-group col-sm btn-sm">
            <label for="exampleInputEmail1">Descripcion</label>
            <input type="text" class="form-control" id="descripcion" name="descripcion" aria-describedby="" placeholder="" value="{{ old('categoria', $categoria->descripcion) }}">
        </div>
    </div>
    
    <div class="row justify-content-center">
        {{--  <button  class="btn btn-danger col-1 w-50 p-2 border" href="">Cancelar</button>  --}}
        <button type="submit" class="btn btn-primary col-1 w-50 p-2 border">Actualizar</button>
        <button type="reset" class="btn btn-secondary col-1 w-50 p-2 border">Limpiar Campos</button>
    </div>
</form>
@endsection
@include('layouts.private.plugins.priv_plu_select2')
