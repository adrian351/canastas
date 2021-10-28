@extends('layouts.private.escritorio.dashboard')
@section('contenido')
<title>Editar Marca</title>
<h1>Editar Marca</h1>
<div>
<a type="submit" class="btn btn-success col-1.5 w-20 p-2 border" 
href="{{ route('subCategoria.store')}}">
    <i class="fas fa-list"></i>   
    Lista de Marcas
</a>
</div>
<br>
{{-- editar marca --}}
<form action="{{ route('marcas.update', $marca->id)}}" autocomplete="off" method="POST">
    @method('PUT')
    @csrf
    <div class="row">
        <div class="form-group col-sm btn-sm">
            <label for="exampleInputEmail1">Marca</label>
            <input type="text" class="form-control" id="marca" name="marca" aria-describedby="emailHelp" placeholder="Marca" value="{{ old('marca', $marca->marca) }}">
        </div>
        <div class="form-group col-sm btn-sm">
            <label for="exampleInputEmail1">Razón Social</label>
            <input type="text" class="form-control" id="razon_social" name="razon_social" aria-describedby="" placeholder="Razón Social" value="{{ old('marca', $marca->razon_social) }}">
        </div>
    </div>
    <div class="row">
        <div class="form-group col-sm btn-sm">
            <label for="exampleInputEmail1">Dominio</label>
            @if(count($marca->dominio)>0)
                @foreach ($marca->dominio as $dom)
                    @if ($dom->dominio !== null)
                    
                    <input type="text" class="form-control"  name="dominio" aria-describedby="" placeholder="Dominio" 
                        value="{{ old('marca', $dom->dominio)}}">  
                    <input type="hidden" class="form-control"  name="dominio_id" aria-describedby=""  
                        value="{{ old('marca', $dom->id)}}">        
                    @endif
                @endforeach
                @else
                    <input type="text" class="form-control" name="dominio" aria-describedby="" placeholder="Dominio" 
                    value="">  
                    <input type="hidden" class="form-control"  name="dominio_id" aria-describedby=""  
                    value="0">             
            @endif
        </div>
        <div class="form-group col-sm btn-sm">
            <label for="exampleInputEmail1">Email</label>
            @if(count($marca->email)>0)
                @foreach ($marca->email as $correo)
                    @if ($correo->email !== null)
                        <input type="text" class="form-control"  name="email" aria-describedby="" placeholder="Email" 
                        value="{{ old('marca', $correo->email)}}">   
                        <input type="hidden" class="form-control"  name="email_id" aria-describedby=""  
                        value="{{ old('marca', $correo->id)}}">          
                    @endif       
                    
                @endforeach
                @else
                    <input type="text" class="form-control" name="email" aria-describedby="" placeholder="Email" 
                    value="">  
                    <input type="hidden" class="form-control"  name="email_id" aria-describedby="" placeholder="Email" 
                    value="0">      
            @endif
        </div>
    </div>

    @if (count ($marca->telefono)==0)
            <div class="row">  
                <div class="form-group col-sm btn-sm">
                    <label for="exampleInputEmail1">Telefono</label>
                    <input type="text" class="form-control"  name="telefono" aria-describedby="" placeholder="Telefono"
                        value="">

                        <input type="hidden" class="form-control"  name="telefono_id" aria-describedby="" 
                        value="0">
                </div>
                <div class="form-group col-sm btn-sm">
                    <label for="exampleInputEmail1">Whats App</label>
                        <input type="text" class="form-control"  name="whats_app" aria-describedby="" placeholder="Whats App" 
                        value="">
                        <input type="hidden" class="form-control"  name="whats_app_id" aria-describedby="" 
                        value="0">
                </div> 
            </div>
        @else  
            <div class="row"> 
                <div class="form-group col-sm btn-sm">
                    <label for="exampleInputEmail1">Telefono</label>
                    {{--  obtener "tipo" de numero y mostralo en la tabla      --}}
                    @if($marca->telefono()->where('tipo','local')->first())
                        <input type="text" class="form-control"  name="telefono" aria-describedby=""     placeholder="Telefono" value="{{$marca->telefono()->where('tipo','local')->first()->telefono}}"
                        >
                        <input type="hidden" class="form-control" name="telefono_id" aria-describedby="" 
                         value="{{$marca->telefono()->where('tipo','local')->first()->id}}"
                        >
                        @else
                        <input type="text" class="form-control"  name="telefono" aria-describedby="" placeholder="Telefono"
                        value="">

                        <input type="hidden" class="form-control"  name="telefono_id" aria-describedby="" 
                        value="0">
                    @endif
                </div> 
                <div class="form-group col-sm btn-sm">
                    <label for="exampleInputEmail1">Whats App</label>
                        @if($marca->telefono()->where('tipo','whats_app')->first())
                            <input type="text" class="form-control"  name="whats_app" aria-describedby="" placeholder="Telefono" value="{{$marca->telefono()->where('tipo','whats_app')->first()->telefono}}">
                            <input type="hidden" class="form-control"  name="whats_app_id" aria-describedby="" value="{{$marca->telefono()->where('tipo','whats_app')->first()->id}}">
                            @else
                            <input type="text" class="form-control"  name="whats_app" aria-describedby="" placeholder="Whats App" 
                            value="">
                            <input type="hidden" class="form-control"  name="whats_app_id" aria-describedby="" 
                            value="0">
                        @endif
                </div> 
            </div>
        
    @endif

    <div class="row">
        <div class="form-group col-sm btn-sm">
            <div class="custom-file">
                <input type="file" class="custom-file-input" id="logotipo" name="logotipo">
                <label class="custom-file-label" for="logotipo">Subir logotipo</label>
            </div>
        </div>
    </div>
    <div class="row justify-content-center">
        {{--  <button  class="btn btn-danger col-1 w-50 p-2 border" href="{{ route('marca.store') }}">Cancelar</button>  --}}
        <button type="submit" class="btn btn-primary col-1 w-50 p-2 border">Actualizar</button>
        <button type="reset" class="btn btn-secondary col-1 w-50 p-2 border">Limpiar Campos</button>
    </div>
</form>
@endsection
@include('layouts.private.plugins.priv_plu_select2')
