@extends('layouts.private.escritorio.dashboard')
@section('contenido')
<title>Editar SubCategoria</title>
<h1>Editar SubCategoria</h1>

    <a type="submit" class="btn btn-success col-1.5 w-20 p-2 border" 
    href="{{ route('subCategoria.store')}}">
        <i class="fas fa-list"></i>   
        Lista de subCategorias
    </a>
    <br/>
    <br/>

<form action="{{ route('subCategoria.update',  $sub_categoria->id)}}" autocomplete="off" method="POST">
    @method('PUT')
    @csrf
    <div class="row">
        <div class="form-group col-sm btn-sm"> 
            <label for="subcategoria">Categoria*</label>
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-level-up-alt"></i></span>
                </div>
                <select class="form-control select2" aria-label="Default select example" placeholder="selecciona"  name="categoria[]">
                  <option  ></option>
                    @for ($i = 0; $i <count($categoria_list); $i++)
                      {{ $encontrado ="false" }}
                        @for ($a = 0; $a <count($sub_categoria->categoria); $a++)
                          @if($categoria_list[$i]->id==$sub_categoria->categoria[$a]->id)
                            {{ $encontrado="true" }}
                          @endif 
                        @endfor
                    {{-- mostrar marcas "selected" y marcas disponibles --}}
                      @if($encontrado=="true")    
                      
                        <option value="{{ $categoria_list[$i]->id }}" selected>{{ $categoria_list[$i]->categoria}}</option>
                          @else
                            <option value="{{ $categoria_list[$i]->id }}" >{{ $categoria_list[$i]->categoria}} </option>
                      @endif 
                    @endfor
                  </select>
            </div>
        </div>

        <div class="form-group col-sm btn-sm">
            <label for="subcaregoria">SubCategoria</label>
            <input type="text" class="form-control" id="subcategoria" name="subcategoria" aria-describedby="emailHelp" placeholder="" value="{{ old('subcategoria', $sub_categoria->subcategoria) }}">
        </div>
        
    </div>

    <div class="row">
        <div class="form-group col-sm btn-sm">
            <label for="exampleInputEmail1">Descripcion</label>
              <input type="text" class="form-control" id="descripcion" name="descripcion" aria-describedby="" placeholder="" value="{{ old('subcategoria', $sub_categoria->descripcion) }}">
        </div>
    </div>
    
    <div class="row justify-content-center">
         {{-- <button  class="btn btn-danger col-1 w-50 p-2 border" href="{{ route('subCategoria.store')}}">Regresar</button>  --}}
        <button type="submit" class="btn btn-primary col-1 w-50 p-2 border">Actualizar</button>
        <button type="reset" class="btn btn-secondary col-1 w-50 p-2 border">Limpiar Campos</button>
    </div>
   
</form>
@endsection
@include('layouts.private.plugins.priv_plu_select2')
