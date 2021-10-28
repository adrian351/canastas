@canany(['armado.producto.create', 'armado.clon.producto.create'])
  @if(Request::route()->getName() == 'armado.edit' OR Request::route()->getName() == 'armado.clon.edit')
    {!! Form::open(['route' => ['armado.producto.store', Crypt::encrypt($armado->id)], 'onsubmit' => 'return checarBotonSubmit("btnArmadoProductoStore")', 'class' => 'col-sm float-right']) !!}
    {{-- 
      <div class="form-group row p-0 m-0">
        <label for="productos" class="col-sm-3 col-form-label">{{ __('Registrar productos') }} *</label>
        <div class="col-sm-9">
          <div class="input-group-append">
            {!! Form::select('ids_productos[]', $productos_list, null, ['class' => 'form-control form-control-sm w-100 select2' . ($errors->has('ids_productos') ? ' is-invalid' : ''), 'multiple']) !!}
            &nbsp&nbsp&nbsp<button type="submit" id="btnArmadoProductoStore" class="btn btn-info rounded" title="{{ __('Registrar') }}"><i class="fas fa-check-circle text-dark"></i></button>
          </div>
          <span class="text-danger">{{ $errors->first('ids_productos') }}</span>
        </div>
      </div>
--}}
  <div class="form-group row p-0 m-0">
    <div class=" form-group col-sm-4">
      <label for="productos" class="col-sm-3 col-form-label">{{ __('Productos') }} *</label>
      <div class="col-sm-9">
        <div class="input-group-append text-dark"> 
          <select  id="select_products" class="form-control select2" placeholder='Seleccione. . .'>
            
            <option value="catalogos">Productos de Catálogo</option>
            <option value="productos">Productos externos</option>
              {{-- @foreach ($productos_list as $producto)
                @if($producto->pro_de_cat == 'Producto de catálogo')
                  @php
                    $pd_pe = 'PC'
                  @endphp
                @else
                  @php
                    $pd_pe = 'PE'
                  @endphp
                @endif
                <option value="{{ $producto->id }}">{{ $producto->produc }} (PP: {{ $producto->prec_prove }}) (PC: {{ $producto->prec_clien }}) [{{ $pd_pe }}]</option>
              @endforeach --}}
          </select>
        </div>
      </div>
      
    </div> 
    <div class="col-sm-2"></div>
    <div class=" form-group col-sm-4">
      <label for="p_catalogo" class="col-sm col-form-label">{{ __('Lista productos') }} *</label>
      <div class="input-group-append text-dark">
        <select class="form-control select2 " id="resultados" placeholder='Seleccione. . .' name="ids_productos[]"  multiple></select>
      </div>
      <span class="text-danger">{{ $errors->first('ids_productos') }}</span>
    </div>
    <div class="form-group col-sm-2">
      <br/>
      <div class="form-group" style="margin: 15px;">
        <center>
          <button type="submit"  id="btnArmadoProductoStore" class="btn btn-success w-50 p-2" title="{{ __('Registrar') }}">{{ __("Agregar") }}</button>
        </center>
      </div>
    </div>
  </div>
  {!! Form::close() !!}
  @endif
@endcanany

@section("js5")
<script>
  const d = @json($productos_list);

  var productos='<option value="">Seleccione</option>' ;
  var productosCatalogos='<option value="">Seleccione</option>';

  for(i = 0; i < d.length; i++){
    var data = d[i];
    if(data.pro_de_cat == 'Producto de catálogo'){
      productosCatalogos += '<option value="'+data.id+'">'+data.produc+' (PP: '+data.prec_prove+') (PC: '+data.prec_clien+') </option>';
      $("#resultados").html(productosCatalogos);
    }else{
      productos += '<option value="'+data.id+'">'+data.produc+' (PP: '+data.prec_prove+') (PC: '+data.prec_clien+')</option>';
    }
  };

  $('#select_products').on('change', function (e) {
    $('#resultados').html("");
    if($(this).val()=='productos'){ 
      $('#resultados').html(productos);
    }else{
      $('#resultados').html(productosCatalogos);
    }
  });

</script>
@endsection