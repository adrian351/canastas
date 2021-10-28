<div class="card {{ config('app.color_card_secundario') }} card-outline">
  <div class="card-header p-1 border-bottom {{ config('app.color_bg_secundario') }}">
    {{--  @php
      $uni = '';
    @endphp  --}}
    {{--  @foreach ($pedido->armados as $armado)  *Solo toma los pedidos sin unificar--}}
        {{--  @foreach ($pedido->armados as $armado)
          @php
            $arm = $armado;
          @endphp
        @endforeach

        @foreach ($pedido->unificar as $unificado)
          @php
            $uni = $unificado;
          @endphp
        @endforeach  --}}
    
    {{--  {{ $arm}}  --}}
    {{--  {{ $pedido}}  --}}
    {{--  problemas con la variable armado  --}}
    {{--  @if ($uni != '' )  --}}
      {{--  <div class="row">
        <div class="col-sm-4">
          <div class="input-group-append text-dark">
            <h5>
              <strong class=" col-sm col-form-label">{{ __('Armados registrados') }}: </strong>@include('venta.pedido.pedido_activo.ven_pedAct_table.td.totalDeArmados'),
              <strong class="col-form-label">{{ __('Terminados') }}: </strong> {{ Sistema::dosDecimales($armados_terminados_produccion) }}
            </h5>
          </div>
        </div>
      </div>  --}}

      {{--  @else  --}}

      {{--  {!! Form::open(['route' => ['produccion.pedidoActivo.armado.terminarArmados', Crypt::encrypt($arm->id)], 'method' => 'patch', 'id' => 'produccionPedidoActivoArmadoTerminarArmados'.$arm->id]) !!}  --}}
        <div class="row">
          <div class="col-sm-4">
            <div class="input-group-append text-dark">
              <h5>
                <strong class=" col-sm col-form-label">{{ __('Armados registrados') }}: </strong>@include('venta.pedido.pedido_activo.ven_pedAct_table.td.totalDeArmados'),
                <strong class="col-form-label">{{ __('Terminados') }}: </strong> {{ Sistema::dosDecimales($armados_terminados_produccion) }}
              </h5>
            </div>
          </div>

          {{--  <div class="col-sm-2"></div>  --}}
          {{--  terminar todos los armados   --}}
          {{--  @if($arm->estat == config('app.productos_completos') OR $arm->estat == config('app.en_produccion'))
          @can('produccion.pedidoActivo.armado.edit')
            <div class="col-sm-4">
              <div class="input-group-append text-dark col-sm">
                <label for="ubicacion_rack" class="col-form-label">
                  <strong>
                      {{ __("Ubicación Rack") }}  
                  </strong>
                </label>
                &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                <input class="form-control col-sm" type="text" placeholder="Ubicación del rack" name="ubicacion_rack"/>
                <input class="form-control col-sm" hidden  type="text" placeholder="Ubicación del rack" name="id_pedido" value="{{ $armados[0]->pedido->id }}" />

              </div>
              <span class="text-danger">{{ $errors->first('ubicacion_rack') }}</span>
            </div>    --}}
            {{--  aqui va el boton    --}}
            {{--  <div class="col-sm-2">
              <div class="input-group-append text-dark col-sm">
                <button type="submit" id="btnsubmit{{ $arm->id}}" class="btn btn-info w-50 p-2 float-right col-sm" onclick="return check('btnsubmit{{ $arm->id}}', 'produccionPedidoActivoArmadoTerminarArmados{{ $arm->id}}', '¡Alerta!', '¿Estás seguro que quieres actualizar el registro?', 'info', 'Continuar', 'Cancelar', 'false');">{{ __("Terminar armados") }}</button>
              </div> 
            </div>
          @endcan
          @endif
        </div>
      {!! Form::close() !!}  
      
    @endif  --}}
    </div>
  </div>

  <div class="card-body">
      {!! Form::model(Request::all(), ['route' => [Request::is('produccion/pedido-activo/editar/*') ? 'produccion.pedidoActivo.edit' : 'produccion.pedidoActivo.show', Crypt::encrypt($pedido->id)],'method' => 'GET']) !!}
      @include('global.buscador.buscador', ['ruta_recarga' => route(Request::is('produccion/pedido-activo/editar/*') ? 'produccion.pedidoActivo.edit' : 'produccion.pedidoActivo.show', Crypt::encrypt($pedido->id)), 'opciones_buscador' => config('opcionesSelect.select_produccion_pedido_armados_index')])
    {!! Form::close() !!}
    @include('produccion.pedido.pedido_activo.armado_activo.armAct_table')
    @include('global.paginador.paginador', ['paginar' => $armados])
  </div>
</div>