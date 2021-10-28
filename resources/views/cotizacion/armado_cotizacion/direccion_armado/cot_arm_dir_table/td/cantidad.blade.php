<td>
  @if($show == true)
    @canany($canany)
      <a href="{{ route($ruta, Crypt::encrypt($direccion->id)) }}" title="Detalles: {{ $direccion->est }}" {{ $target }}>{{ Sistema::dosDecimales($direccion->cant) }}</a>
    @else
    {{ Sistema::dosDecimales($direccion->cant) }}
    @endcanany
  @else
    {{ Sistema::dosDecimales($direccion->cant) }}
  @endif

  @if($direccion->for_loc == 'Foráneo')
    <i class="fas fa-globe-africa" title="{{ __('Foráneo') }}"></i>
  @endif
</td>