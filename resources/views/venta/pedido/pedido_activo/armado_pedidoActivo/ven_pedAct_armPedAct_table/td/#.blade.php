<td>
  @if($show == true)
    @canany($canany)
      <a href="{{ route($ruta, Crypt::encrypt($armado->id)) }}" title="Detalles: {{ $armado->cod }}">{{ $armado->cod }}</a>
    @else
      {{ $armado->cod }}
    @endcanany
  @else
    {{ $armado->cod }}
  @endif

  @if($armado->for_loc == config('opcionesSelect.select_foraneo_local.Foráneo'))
    <i class="fas fa-globe-africa" title="{{ __('Foráneo') }}"></i>
  @endif
</td>