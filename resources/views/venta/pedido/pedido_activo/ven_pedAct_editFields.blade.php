@php
  $suma=0;
  $limite = 4000;
  $cortar = explode("-", $init);
@endphp
@foreach ($pedido_date as $pedido)
  @php
  $suma += $pedido->arm_carg; 
  @endphp 
@endforeach

  <div class="row">
    <div class="form-group col-sm btn-sm">
      <label for="fecha_de_entrega">{{ __('Fecha de entrega') }}</label>
      <div class="input-group">
        <div class="input-group-prepend">
          <span class="input-group-text"><i class="fas fa-calendar-alt"></i></i></span>
        </div>
          {{-- {!! Form::date('fecha_de_entrega', $init, ['class' => 'form-control', 'id' => 'entrega', 
          'min' =>$init]) !!} --}}
          {!! Form::date('fecha_de_entrega', $pedido->fech_de_entreg, ['class' => 'form-control', 'id' => 'entrega', 
          'min' =>$init]) !!}
      </div>
      <span class="text-danger">{{ $errors->first('fecha_de_entrega') }}</span>
    </div>
  </div>
  <div  id="nota_produccion" style="display: none">
    <div class="btn-sm-info">
      <button class="btn btn-danger" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
        <strong>{{ '¡ NOTA ! ' }}</strong>
      </button>
      <span class="text-danger"> {{ __("Se ha producido un inconveniente ") }}</span>
    </div>  
    <div class="collapse" id="collapseExample">
      <div class="card card-body" style="background-color: #e7f3fe; border-left: 6px solid #2196F3;">
        <ul id="ul">
        </ul>
      </div>
    </div>
  </div>


<div class="row">
  <div class="form-group col-sm btn-sm">
    <label for="se_puede_entregar_antes">{{ __('¿Se puede entregar antes?') }}</label>
    <div class="input-group">
      <div class="input-group-prepend">
        <span class="input-group-text"><i class="fas fa-question"></i></span>
      </div>
      {!! Form::select('se_puede_entregar_antes', config('opcionesSelect.select_se_puede_entregar_antes'), $pedido->se_pued_entreg_ant, ['id' => 'se_puede_entregar_antes', 'class' => 'form-control select2' . ($errors->has('se_puede_entregar_antes') ? ' is-invalid' : ''), 'placeholder' => __(''), 'onChange' => 'getSePueEntAnt();']) !!}
    </div>
    <span class="text-danger">{{ $errors->first('se_puede_entregar_antes') }}</span>
  </div>
  <div id="cuantos-dias-antes">
    <div class="form-group col-sm btn-sm">
      <label for="cuantos_dias_antes">{{ __('¿Cuántos días antes?') }}</label>
      <div class="input-group">
        <div class="input-group-prepend">
          <span class="input-group-text"><i class="fas fa-question"></i></span>
        </div>
        {!! Form::text('cuantos_dias_antes', $pedido->cuant_dia_ant, ['class' => 'form-control' . ($errors->has('cuantos_dias_antes') ? ' is-invalid' : ''),  'maxlength' => 3, 'placeholder' => __('¿Cuántos días antes?')]) !!}
      </div>
      <span class="text-danger">{{ $errors->first('cuantos_dias_antes') }}</span>
    </div>
  </div>
</div>

<div class="row">
  <div class="form-group col-sm btn-sm">
    <label for="es_pedido_urgente">{{ __('¿Es pedido urgente?') }} *</label>
    <div class="input-group">
      <div class="input-group-prepend">
        <span class="input-group-text"><i class="fas fa-question"></i></span>
      </div>
      {!! Form::select('es_pedido_urgente', config('opcionesSelect.es_pedido_urgente'), $pedido->urg, ['class' => 'form-control select2' . ($errors->has('es_pedido_urgente') ? ' is-invalid' : ''), 'placeholder' => __('')]) !!}
    </div>
    <span class="text-danger">{{ $errors->first('es_pedido_urgente') }}</span>
  </div>
  <div class="form-group col-sm btn-sm">
    <label for="es_pedido_de_stock">{{ __('¿Es pedido de STOCK?') }}</label>
    <div class="input-group">
      <div class="input-group-prepend">
        <span class="input-group-text"><i class="fas fa-question"></i></span>
      </div>
      {!! Form::select('es_pedido_de_stock', config('opcionesSelect.select_se_puede_entregar_antes'), $pedido->stock, ['id' => 'es_pedido_de_stock', 'class' => 'form-control select2' . ($errors->has('es_pedido_de_stock') ? ' is-invalid' : ''), 'placeholder' => __('')]) !!}
    </div>
    <span class="text-danger">{{ $errors->first('es_pedido_de_stock') }}</span>
  </div>
</div>
<div class="row">
  <div class="form-group col-sm btn-sm">
    <label for="comentarios_ventas">{{ __('Comentarios ventas') }}</label>
    <div class="input-group">
      <div class="input-group-prepend">
        <span class="input-group-text"><i class="fas fa-text-width"></i></span>
      </div>
      {!! Form::textarea('comentarios_ventas', $pedido->coment_vent, ['class' => 'form-control' . ($errors->has('comentarios_ventas') ? ' is-invalid' : ''), 'maxlength' => 30000, 'placeholder' => __('Comentarios ventas'), 'rows' => 4, 'cols' => 4]) !!}
    </div>
    <span class="text-danger">{{ $errors->first('comentarios_ventas') }}</span>
  </div>
</div>
{{-- para prueba desarrollo2 --}}
{{--  <div class="row">
  <div class="form-group col-sm btn-sm">
    <a href="{{ route('venta.pedidoActivo.armado.direccion.edit', Crypt::encrypt($pedido->id)) }}" class="btn btn-secondary p-2">{{ __("Agregar tarjeta de Felicitacion") }}</a>
  </div>
</div>  --}}

<div class="row">
  <div class="form-group col-sm btn-sm" >
    <a href="{{ route('venta.pedidoActivo.index') }}" class="btn btn-default w-50 p-2 border"><i class="fas fa-sign-out-alt text-dark"></i> {{ __('Regresar') }}</a>
  </div>
  <div class="form-group col-sm btn-sm">
    <button type="submit" id="btnsubmit" class="btn btn-info w-100 p-2" onclick="return check('btnsubmit', 'ventaPedidoActivoUpdate', '¡Alerta!', '¿Estás seguro quieres actualizar el registro?', 'info', 'Continuar', 'Cancelar', 'false');"><i class="fas fa-edit text-dark"></i> {{ __('Actualizar pedido') }}</button>
  </div>
</div>
@include('layouts.private.plugins.priv_plu_select2')
@section('js5')
<script>
  window.onload = function() { 
    getSePueEntAnt();
  }
  function getSePueEntAnt() {
    // Obtiene los valores de los inputs
    selectSePuedeEntregarAntes = document.getElementById("se_puede_entregar_antes"),
    se_puede_entregar_antes = selectSePuedeEntregarAntes.value;
    cuantos_dias_antes = document.getElementById('cuantos-dias-antes');
    // ---
    
    if(se_puede_entregar_antes == 'Si') {
      cuantos_dias_antes.style.display = 'block';

    } else if(se_puede_entregar_antes == 'No' || se_puede_entregar_antes == '') {
      cuantos_dias_antes.style.display = 'none';
    }
  }


  $("#entrega").on('change', fechaEntrega);
  const limite = @json($limite);
  const pedido = @json($pedido_date);
  const total=  @json($totalarmados);
  {{--  const pedido_editado = @json($pedido);  --}}
  function fechaEntrega(){
    fechaDeEntrega = document.getElementById("entrega");
    fecha_de_entrega = fechaDeEntrega.value;
    nota = document.getElementById("nota_produccion");
 
    var fecha=[];
      fecha[0] = $(this).val();
      fecha[1]= total;

    $.get('/venta/getfecha/'+fecha+'/', function(data){ //ruta: /marca/'+marca_id+'/
      //aqui si es true y si no te da msj
      var totalArmados = parseInt(data);
      var suma = totalArmados + fecha[1];
      var ul = '<li><span><h6 style="color:#CF0000">Se ha rebasado el límite de armados para producir.</h6></span><ul><li><span><h6 style="color:#CF0000">Límite de armados para producir por día: '+limite+' armados.</h6></span></li><li><span style="color:#CF0000"><h6>Su pedido es de : '+fecha[1]+' armados.</h6></span></li><li><span><h6 style="color:#CF0000">Por favor elija una fecha de entrega diferente.</h6></span></li></ul></li><li><span><h6>Total para entregar el día (' +fecha[0]+'): '+totalArmados+' armados.</h6></span></li>'
      
      $("#ul").html(ul);

      if(totalArmados >= 4000  || suma >= 4000){
        nota.style.display = 'block';
      }else if(isNaN(totalArmados) || totalArmados <= 4000 ){
        nota.style.display = 'none';
      } 
    });
  }

</script>
@endsection
