<?php
namespace App\Repositories\venta\pedidoActivo\armadoPedidoActivo;

interface ArmadoPedidoActivoInterface {
  public function armadoFindOrFailById($id_armado, $relaciones);

  public function update($request, $id_armado);
}