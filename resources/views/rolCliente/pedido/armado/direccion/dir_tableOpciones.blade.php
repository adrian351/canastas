<td width="1rem" title="Editar: {{ $direccion->est }}">
  @if($direccion->nom_ref_uno == null)
    <a href="{{ route('rolCliente.pedido.armado.direccion.edit', Crypt::encrypt($direccion->id)) }}" class='btn btn-light btn-sm'><i class="fas fa-edit"></i></a>
  @endif
</td>