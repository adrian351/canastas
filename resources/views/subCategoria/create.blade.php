@extends('layouts.private.escritorio.dashboard')
@section('contenido')
<title> Registrar SubCategoria </title>
<h1>Registrar SubCategoria</h1>
    <br/>

    <a type="submit" class="btn btn-success col-1.5 w-20 p-2 border" 
    href="{{ route('subCategoria.store')}}">
        <i class="fas fa-list"></i>   
        Lista de SubCategorias
    </a>
    <br/>
    <br/>


<form action="{{ route('subCategoria.store') }}" autocomplete="off" method="POST" >
    @csrf
    <div class="row">
        <div class="form-group col-sm btn-sm"> 
            <label for="categoria">Categoria*</label>
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-level-up-alt"></i></span>
                </div>
                <select class="form-control select2" aria-label="Default select example" placeholder="selecciona"  name="categoria[]" >
                        <option></option>
                        @foreach ($categoria_list as $categoria )
                        <option value="{{ $categoria->id }}">{{ $categoria->categoria}}</option>
                        @endforeach
                </select>
            </div>
        </div>
        <div class="form-group col-sm btn-sm">
            <label for="exampleInputEmail1">SubCategoria</label>
            <input type="text" class="form-control" id="subcategoria" name="subcategoria" aria-describedby="emailHelp" placeholder="SubCategoria" required>
        </div>
    </div>

    <div class="row">
        <div class="form-group col-sm btn-sm">
            <label for="exampleInputEmail1">Descripcion</label>
            <input type="text" class="form-control" id="descripcion" name="descripcion" aria-describedby="" placeholder="Desc...">
        </div>
    </div>

    <div class="row justify-content-center">
        <button type="submit" class="btn btn-primary col-1 w-50 p-2 border" >Guardar</button>
        <button type="reset" class="btn btn-secondary col-1 w-50 p-2 border">Limpiar Campos</button>
         {{-- <button type="btn" class="btn btn-success col-1 w-50 p-2 border" href="{{ route('subCategoria.store') }}">Ir a SubCategorias</button>   --}}
    </div>
</form>
@endsection
@include('layouts.private.plugins.priv_plu_select2')