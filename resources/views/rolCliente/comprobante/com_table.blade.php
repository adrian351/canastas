<div class="card-body table-responsive p-0" id="div-tabla-scrollbar" style="height: 40em;"> 
  <table class="table table-head-fixed table-hover table-striped table-sm table-bordered">
    @if(sizeof($pedidos) == 0)
      @include('layouts.private.busquedaSinResultados', ['mensaje' => 'Sin resultados'])
    @else 
      <thead>
        <tr>
          @include('venta.pedido.pedido_activo.ven_pedAct_table.th.numeroDePedido')
          @include('venta.pedido.pedido_activo.ven_pedAct_table.th.fechaDeEntrega')
          @include('venta.pedido.pedido_activo.ven_pedAct_table.th.totalDeArmados')
          @include('venta.pedido.pedido_activo.ven_pedAct_table.th.estatusPago')
          @include('venta.pedido.pedido_activo.ven_pedAct_table.th.estatusLogistica')
          {{-- @include('venta.pedido.pedido_activo.ven_pedAct_table.th.estatusProduccion') --}}
          <th>
            COMPROBANTE DE ENTREGA
          </th>
          {{--  <th colspan="2">&nbsp</th>  --}}
        </tr>
      </thead>
      <tbody> 
        @foreach($pedidos as $pedido)
          <tr title="{{ $pedido->num_pedido }}">
            @include('venta.pedido.pedido_activo.ven_pedAct_table.td.numeroDePedido')
            @include('venta.pedido.pedido_activo.ven_pedAct_table.td.fechaDeEntrega')
            @include('venta.pedido.pedido_activo.ven_pedAct_table.td.totalDeArmados')
            @include('venta.pedido.pedido_activo.ven_pedAct_table.td.estatusPago')
            @include('venta.pedido.pedido_activo.ven_pedAct_table.td.estatusLogistica')
            {{-- @include('venta.pedido.pedido_activo.ven_pedAct_table.td.estatusProduccionCliente') --}}
            {{--  @include('rolCliente.comprobante.com_tableOpciones')   --}}
            
            <td> 
              @foreach ($pedido->armados as $arm)
                @foreach ($arm->direcciones as $dir)
                  {{--  {{ var_dump($dir->comp_de_sal_rut) }}
                  {{ var_dump($dir->comp_de_sal_nom) }}  --}}
                  @if ($dir->comp_de_sal_rut == null )
                      {{-- no mostramos nada   --}}
                    @else
                      <div class="card" style="width: 2rem; float: left; margin: 1rem;">
                        {{-- <div class="col"><br/>
                          <div class="card" > --}}
                              <a href="{{$dir->comp_de_sal_rut.$dir->comp_de_sal_nom}}" title="Ver">
                                <img src="{{ $dir->comp_de_sal_rut.$dir->comp_de_sal_nom}}" class="card-img-top" />
                              </a>  
                          {{-- </div>
                        </div> --}}
                      </div>  
                  @endif
                  {{--  <div class="card" style="width: 5rem;">
                    <img src="{{ $dir->comp_de_sal_rut.$dir->comp_de_sal_nom}}" class="card-img-top" >
                        <p class="card-text text-muted text-sm">
                          <a href="{{$dir->comp_de_sal_rut.$dir->comp_de_sal_nom}}"  class='btn btn-light border'>{{ __('Ver') }}</a>
                        </p>  
                  </div>  --}}
                @endforeach
              @endforeach
            </td>
          </tr>
          @endforeach
      </tbody>
    @endif
  </table>
</div>