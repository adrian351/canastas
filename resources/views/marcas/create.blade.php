@extends('layouts.private.escritorio.dashboard')
@section('contenido')
<title> Registrar Marca </title>
<h1>Registrar Marca</h1>
<br/>

    <a type="submit" class="btn btn-success col-1.5 w-20 p-2 border" 
    href="{{ route('marca.store')}}">
        <i class="fas fa-list"></i>   
        Lista de Marcas
    </a>
    <br/>
    <br/>
{{-- crear marca --}}
<form action="{{ route('marca.store') }}" autocomplete="off" method="POST" >
    @csrf
    <div class="row">
        <div class="form-group col-sm btn-sm">
            <label for="exampleInputEmail1">Marca</label>
            <input type="text" class="form-control" id="marca" name="marca" aria-describedby="emailHelp" placeholder="Marca" required>
           
        </div> 
        <div class="form-group col-sm btn-sm">
            <label for="exampleInputEmail1">Razón Social</label>
            <input type="text" class="form-control" id="razon_social" name="razon_social" aria-describedby="" placeholder="Razón Social" required>
        </div>
    </div>
    <div class="row">
        <div class="form-group col-sm btn-sm">
            <label for="exampleInputEmail1">Dominio</label>
            <input type="text" class="form-control" id="dominio" name="dominio" aria-describedby="" placeholder="Dominio">
        </div>
        <div class="form-group col-sm btn-sm">
            <label for="exampleInputEmail1">Email</label>
            <input type="email" class="form-control" id="email" name="email" aria-describedby="" placeholder="Email">
        </div>
    </div>
    <div class="row">
        <div class="form-group col-sm btn-sm">
            <label for="exampleInputEmail1">Telefono</label>
            <input type="text" class="form-control" id="telefono" name="telefono" aria-describedby="" placeholder="Telefono">
        </div>
        <div class="form-group col-sm btn-sm">
            <label for="exampleInputEmail1">Whats App</label>
            <input type="text" class="form-control" id="whats_app" name="whats_app" aria-describedby="" placeholder="Whats App">
        </div>
    </div>
    <div class="row">
        <div class="form-group col-sm btn-sm">
            <div class="custom-file">
                <input type="file" class="custom-file-input" id="logotipo" name="logotipo">
                <label class="custom-file-label" for="logotipo">Subir logotipo</label>
            </div>
        </div>
    </div>
    <div class="row justify-content-center">
        <button type="submit" class="btn btn-primary col-1 w-50 p-2 border" >Guardar</button>
        <button type="reset" class="btn btn-secondary col-1 w-50 p-2 border">Limpiar Campos</button>
        {{-- <button type="submit" class="btn btn-success col-1 w-50 p-2 border" href="{{ route('marca.store') }}">Ir a Marcas</button>  --}}
    </div>
    <div>
        
    </div>
</form>
@endsection
@include('layouts.private.plugins.priv_plu_select2')
