{!! Form::open(['route' => ['cotizacion.armado.store', Crypt::encrypt($cotizacion->id)], 'onsubmit' => 'return checarBotonSubmit("btnCotizacionArmadoStore")', 'class' => 'col-sm  float-right']) !!}
 {{-- 
  <div class="form-group row p-0 m-0"> <label for="armados" class="col-sm-3 col-form-label">{{ __('Agregar armado') }} *</label>
    <div class="col-sm-9"> <div class="input-group-append text-dark">
        {!! Form::select('id_armado', $armados_list, null, ['class' => 'form-control form-control-sm w-100 select2' . ($errors->has('id_armado') ? ' is-invalid' : ''), 'placeholder' => __('')]) !!}
        &nbsp&nbsp&nbsp<button type="submit" id="btnCotizacionArmadoStore" class="btn btn-info rounded" title="{{ __('Agregar') }}"><i class="fas fa-check-circle text-dark"></i></button>
      </div> <span class="text-danger">{{ $errors->first('id_armado') }}</span>
    </div> </div>--}}

 {{--  agregar armados segun la marca seleccionada  --}}
  <div class=" form-group row p-0 m-0">
    <div class="form-group col-sm-2">
      <label for="marcas" >{{ __("Marcas") }}</label>
        <div class="input-group-append text-dark">
          <select name="marca" id="select-marca" class="form-control select col-sm" placeholder="Seleccione...">
            <option  disabled> Seleccione una marca</option>
              @foreach ($marcas_list as  $marcas)
                <option value="{{ $marcas->id }}">{{ $marcas->marca }}</option>
                {{-- poner una marca por defecto:  {{ ($marcas->marca == "Canastas y Arcones" ? "selected" : "")}}  --}}
              @endforeach
            <option value="">Personalizados</option>
          </select>
        </div>
    </div>
    <div class="form-group col-sm-5">
      <label for="armados" >{{ __('Armados') }} </label>
        <div class="input-group-append text-dark">
          <select  name="id_armado" id="select-armado" class="form-control select2" > 
          </select>   
        </div>
        <span class="text-danger">{{ $errors->first('id_armado') }}</span>
    </div>

    <div class="col-sm-2"></div>

    {{-- <div class="form-group col-sm-4">
      <label for="personalizados" >{{ __('Armados que no son de catálogo') }}</label>
       <div class="input-group-append text-dark">
         <select name="id_armado" id="armados" class="form-control select2" placeholder='Seleccione. . .' >
           <option value="">Seleccione...</option>
             @foreach ($armados_list as $armado)
              @if ($armado->arm_de_cat == 'No' )
                 <option  value="{{ $armado->id }}">{{ $armado->nom }}</option>
              @endif
              
             @endforeach 
         </select>
       </div> 
    </div>  --}}

    <div class="form-group col-sm-2">
      <br/>
      <div class="form-group" style="margin: 6px;">
        <center>
          <button type="submit"  id="btnCotizacionArmadoProductoStore" class="btn btn-success w-100 p-2" title="{{ __('Agregar') }}">{{ __("Agregar") }}</button>
        </center>
      </div>
    </div>
  </div>

    {{--  <label for="armados" class="col-sm-3 col-form-label">{{ __('Agregar armado') }} *</label>
    <div class="col-sm-9">
      <div class="input-group-append text-dark"> 
        <select name="id_armado"  class="form-control select2" placeholder='Seleccione. . .'>
          <option value="">Seleccione. . .</option>
             @foreach ($armados_list as $armado)
                <option value="{{ $armado->id }}">{{ $armado->nom }} ({{ $armado->sku }})</option>
            @endforeach
        </select>
        &nbsp&nbsp&nbsp<button type="submit"  id="btnCotizacionArmadoProductoStore" class="btn btn-info rounded" title="{{ __('Agregar') }}"><i class="fas fa-check-circle text-dark"></i></button>
      </div>
      <span class="text-danger">{{ $errors->first('id_armado') }}</span>
    </div> 
  </div>  --}}
{!! Form::close() !!}

@section('js5')
<script>

  $('#select-marca').on('change', onChangeSelectMarca);
  {{--  Array de armados  --}}
  const d = @json($armados_list);
  var select_todos='<option value="">Seleccione</option>' ;

  for(i = 0; i < d.length; i++){  //recorremos el array de armados
    var data = d[i];
    if(data.arm_de_cat == 'No'){
      if(data.sku == null){
        select_todos += '<option value="'+data.id+'">'+data.nom+'</option>';
      }else{
        select_todos += '<option value="'+data.id+'">'+data.nom+' ('+data.sku+') </option>';
      }
    }
  };

  getArmados(11);
 
    function getArmados(marca_id){
      //console.log("id: " + marca_id);
      $.get('/marca/'+marca_id+'', function(data){ //ruta: /marca/'+marca_id+'/
        var html_select = '<option value="">Seleccione</option>';
        for(i = 0; i < data.length; i++){
          var datos = data[i]; //almacenamos la data(armados) en una variable
          if(datos.arm_de_cat == 'Si'){ //mostramos solo los arcones que sean de catalogos.
              //console.log(datos);
              if(datos.sku == null ){
                html_select += '<option value="'+datos.id+'">'+datos.nom+' </option>'; //si todo esta bien, pintamos las opciones
                $('#select-armado').html(html_select);//le agregamos la lista de opciones a select de armados
              }else{
                html_select += '<option value="'+datos.id+'">'+datos.nom+' ('+datos.sku+') </option>'; //si todo esta bien, pintamos las opciones
                $('#select-armado').html(html_select);//le agregamos la lista de opciones a select de armados
              }
          }
        }
      });
    }
    
  function onChangeSelectMarca(){
    $('#select-armado').html("");
    var marca_id = $(this).val();

    //si la marca es diferente pasamos todos los armados que no son de catalogo
    if(!marca_id){ ///personalizados
      $('#select-armado').html(select_todos);
      return false;
    }
    getArmados(marca_id);
  };

</script>
@endsection