@extends('layouts.private.escritorio.dashboard')
@section('contenido')
<title>Lista de Marcas</title>
<div class="shadow-lg p-2 mb-3 bg-body rounded bg-primary ">
    <center>
      <h5>
        <strong>{{ __('Lista de Marcas') }}</strong> 
      </h5>
    </center>
</div>
<br/>
<div class="card">
    <div class="card-body">
        <div>
            <a type="submit" class="btn btn-success col-1.5 w-20 p-2 border" 
            href="{{ route('marca.create')}}">
            <i class="fas fa-plus"></i>   
            Nueva Marca
            </a>
        </div>
        <br>
        {{-- visualizar todas las marcas --}}
        <div class="card-body table-responsive p-0" id="div-tabla-scrollbar" style="height: 40em;">
            <table class="table table-head-fixed table-hover table-striped table-sm table-bordered">
            <thead>
                <tr>
                    <th scope="col">Nombre</th>
                    <th scope="col">Razón Social</th>
                    <th scope="col">Dominio</th>
                    <th scope="col">Telefono</th>
                    <th scope="col">Whats App</th>
                    <th scope="col">Email</th>
                    <th scope="col">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($todo as $m)
                <tr>
                    <td width="1rem">{{$m->marca}}</td>
                    <td width="1rem">{{$m->razon_social}}</td>
                    <td width="1rem">
                        @foreach ($m['dominio'] as $mail )
                        <span> {{$mail->dominio}}</span>     
                        @endforeach
                    </td>
                    {{-- //condicional tipo de numero (whats, tel) --}} 
                    <td width="1rem" >
                        @foreach ($m['telefono'] as $mail )               
                            @if ($mail->tipo=='local') {{-- obtener"tipo"denumeroporcoincidenciadetexto(tipo) --}}
                                <span> 
                                    {{$mail->telefono}}
                                    {{ $mail->tipo  }} 
                                </span> 
                                @else
                                    <span> </span> 
                            @endif
                        @endforeach
                    </td>
                    <td width="1rem">
                        @foreach ($m['telefono'] as $mail )
                            @if ($mail->tipo=='whats_app') 
                                <span> 
                                    {{$mail->telefono}}
                                    {{ $mail->tipo  }}
                                </span>
                                @else
                                    <span> </span>
                                
                            @endif
                        @endforeach        
                    </td>       
                    <td width="1rem">
                        @foreach ($m['email'] as $mail )
                            <span> {{$mail->email}}</span>     
                        @endforeach
                    </td>
                    <td width="1rem" align="center">
                        <a href="{{route('marca.edit',$m)}}"
                        type="button" class="btn btn-primary col-2 w-30 p-1 border" 
                        title="Editar"
                        >
                            <i class="fas fa-edit"></i>
                        </a>
                        <a href="{{route('marca.delete',$m)}}"
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