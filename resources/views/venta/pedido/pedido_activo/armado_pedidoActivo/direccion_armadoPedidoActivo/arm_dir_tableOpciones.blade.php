<td width="1rem" title="Editar: {{ $direccion->est }}">
  @can('venta.pedidoActivo.armado.edit')
    <a href="{{ route('venta.pedidoActivo.armado.direccion.edit', Crypt::encrypt($direccion->id)) }}" class='btn btn-light btn-sm'><i class="fas fa-edit"></i></a>
  @endcan
</td>