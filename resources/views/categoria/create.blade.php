@extends('layouts.private.escritorio.dashboard')
@section('contenido')
<title> Registrar Categoria </title>
<h1>Registrar Categoria</h1>
<br>
    <a type="submit" class="btn btn-success col-1.5 w-20 p-2 border" 
    href="{{ route('categoria.store')}}">
        <i class="fas fa-list"></i>   
        Lista de Categorias
    </a>
    <br/>
    <br/>
{{--    --}}
<form action="{{ route('categoria.store') }}" autocomplete="off" method="POST" >
    @csrf
    <div class="row">
        <div class="form-group col-sm btn-sm">
            <label for="exampleInputEmail1">Categoria</label>
            <input type="text" class="form-control" id="categoria" name="categoria" aria-describedby="emailHelp" placeholder="Categoria" required>
        </div>
        <div class="form-group col-sm btn-sm">
            <label for="exampleInputEmail1">Descripcion</label>
            <input type="text" class="form-control" id="descripcion" name="descripcion" aria-describedby="" placeholder="Desc...">
        </div>
    </div>
    <div class="row justify-content-center">
        <button type="submit" class="btn btn-primary col-1 w-50 p-2 border" >Guardar</button>
        <button type="reset" class="btn btn-secondary col-1 w-50 p-2 border">Limpiar Campos</button>
         {{-- <button type="btn" class="btn btn-success col-1 w-50 p-2 border" href="{{ route('categoria.store') }}">Ir a Categorias</button>   --}}
    </div>
    <div>
        
    </div>
</form>
@endsection
@include('layouts.private.plugins.priv_plu_select2')