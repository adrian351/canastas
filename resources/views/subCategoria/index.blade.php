@extends('layouts.private.escritorio.dashboard')
@section('contenido')
<title>Lista de SubCategorias</title>
<div class="shadow-lg p-2 mb-3 bg-body rounded bg-primary ">
    <center>
      <h5>
        <strong>{{ __('Lista de SubCategorias') }}</strong> 
      </h5>
    </center>
</div>
<br>
<div class="card">
    <div class="card-body">
        <div>
            {{--  {{ route('categoria.create')}}  --}}
            <a type="submit" class="btn btn-success col-1.5 w-20 p-2 border" 
            href="{{ route('subCategoria.create')}}">
            <i class="fas fa-plus"></i>   
            Nueva SubCategoria
            </a>
        </div>
        <br>
        <div class="card-body table-responsive p-0" id="div-tabla-scrollbar" style="height: 40em;">
        <table class="table table-head-fixed table-hover table-striped table-sm table-bordered">
            <thead>
                <tr>
                <th scope="col">Categoria</th>
                <th scope="col">SubCategoria</th>
                <th scope="col">Descripcion</th>
                <th scope="col">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ( $todos as $subcategoria)
                <tr>
                            {{-- Extraer la categoria de categorias --}}
                    <td width="1rem">{{ $subcategoria->categoria()->pluck('categoria')->first()}}</td>
                    <td width="1rem">{{ $subcategoria->subcategoria }}</>
                    <td width="1rem">{{ $subcategoria->descripcion }}</td>
                    <td width="1rem" align="center">
                        <a href="{{route('subCategoria.edit', $subcategoria)}}"
                            type="button" class="btn btn-primary col-2 w-30 p-1 border" 
                            title="Editar"
                        >
                            <i class="fas fa-edit"></i>
                        </a>        
                        <a href="{{route('subCategoria.delete',$subcategoria)}}  "
                            type="button" class="btn btn-danger col-2 w-30 p-1 border" 
                            title="Eliminar"
                        >
                            <i class="fas fa-trash"></i> 
                        </a>
                    </td>
                    </tr>    
                
                @endforeach  
            </tbody>
        </table>
        </div>
    </div>
</div>
@endsection