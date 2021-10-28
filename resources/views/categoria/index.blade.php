@extends('layouts.private.escritorio.dashboard')
@section('contenido')
<title>Lista de Categorias</title>
<div class="shadow-lg p-2 mb-3 bg-body rounded bg-primary ">
    <center>
      <h5>
        <strong>{{ __('Lista de Categorias') }}</strong> 
      </h5>
    </center>
</div>
<br>
<div class="card">
    <div class="card-body">
        <div>
            {{--  {{ route('categoria.create')}}  --}}
            <a type="submit" class="btn btn-success col-1.5 w-20 p-2 border" 
                href="{{ route('categoria.create')}}">
                <i class="fas fa-plus"></i>   
                Nueva Categoria
            </a>
        </div>
        <br>
        <div class="card-body table-responsive p-0" id="div-tabla-scrollbar" style="height: 40em;">
                <table class="table table-head-fixed table-hover table-striped table-sm table-bordered">
                    <thead>
                        <tr>
                            <th scope="col">Nombre</th>
                            <th scope="col">Descripcion</th>
                            <th scope="col" width="15%">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ( $todos as $categoria)
                        <tr>
                            <td width="1rem">{{ $categoria->categoria }}</td>
                            <td width="1rem">{{ $categoria->descripcion }}</td>
                            <td width="1rem" align="center">
                                <a href="{{route('categoria.edit', $categoria)}}"
                                {{--  {{route('categoria.edit')}}  --}}
                                type="button" class="btn btn-primary col-2 w-30 p-1 border" 
                                title="Editar"
                                >
                                    <i class="fas fa-edit"></i>
                                </a>
                                
                                <a href="{{route('categoria.delete',$categoria)}}  "
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