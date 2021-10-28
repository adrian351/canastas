<div class="row">
  @if($direccion->comp_de_sal_nom != NULL)
    <div class="form-group col-sm btn-sm">
      <a href="{{ $direccion->comp_de_sal_rut.$direccion->comp_de_sal_nom }}" class="btn btn-info border text-dark" target="_blank"><i class="fas fa-search-plus"></i></a>
      <label for="comprobante_de_salida">{{ __('Comprobante de salida') }}</label> {{ $direccion->created_com_sal }} ({{ $direccion->fech_car_comp_de_sal }})
      <div class="form-group col-sm btn-sm">
        <div class="pad box-pane-right no-padding" style="min-height: 280px">
          <iframe src="{{ $direccion->comp_de_sal_rut.$direccion->comp_de_sal_nom }}" style="width:100%;border:none;height:15rem;"></iframe>
        </div>
      </div>
    </div>
  @endif
  @if(!$comprobantes->isEmpty())
    @if($comprobantes[0]->comp_ent_nom != NULL)
      <div class="form-group col-sm btn-sm">
        <a href="{{ $comprobantes[0]->comp_ent_rut.$comprobantes[0]->comp_ent_nom }}" class="btn btn-info border text-dark" target="_blank"><i class="fas fa-search-plus"></i></a>
        <label for="comprobante_de_salida">{{ __('Comprobante de entrega') }}</label> {{ $comprobantes[0]->created_at_comp }} ({{ $comprobantes[0]->created_at }})
        <div class="form-group col-sm btn-sm">
          <div class="pad box-pane-right no-padding" style="min-height: 280px">
            <iframe src="{{ $comprobantes[0]->comp_ent_rut.$comprobantes[0]->comp_ent_nom }}" style="width:100%;border:none;height:15rem;"></iframe>
          </div>
        </div>
      </div>
    @endif
  @endif
</div>