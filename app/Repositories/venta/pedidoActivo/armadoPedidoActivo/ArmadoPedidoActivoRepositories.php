<?php
namespace App\Repositories\venta\pedidoActivo\armadoPedidoActivo;
// Models
use App\Models\PedidoArmado;
// Events
use App\Events\layouts\ActividadRegistrada;
// Servicios
use App\Repositories\servicio\crypt\ServiceCrypt;
// Otros
use Illuminate\Support\Facades\Auth;
use DB;

class ArmadoPedidoActivoRepositories implements ArmadoPedidoActivoInterface {
  protected $serviceCrypt;
  public function __construct(ServiceCrypt $serviceCrypt) {
    $this->serviceCrypt             = $serviceCrypt;
  } 
  public function armadoFindOrFailById($id_armado, $relaciones) { // 'productos', 'direcciones', 'pedido'
    $id_armado = $this->serviceCrypt->decrypt($id_armado);
    $armado = PedidoArmado::with($relaciones)->findOrFail($id_armado);
    return $armado;
  }
  public function update($request, $id_armado) {
    try { DB::beginTransaction();
      $armado = $this->armadoFindOrFailById($id_armado, []);
      $armado->coment_vent  = $request->comentarios_adicionales;

      if($armado->isDirty()) {
        // Dispara el evento registrado en App\Providers\EventServiceProvider.php
        ActividadRegistrada::dispatch(
          'Ventas/Pedidos activos (armados)', // Módulo
          'venta.pedidoActivo.armado.show', // Nombre de la ruta
          $id_armado, // Id del registro debe ir encriptado
          $armado->cod, // Id del registro a mostrar, este valor no debe sobrepasar los 100 caracteres
          array('Comentarios adicionales'), // Nombre de los inputs del formulario
          $armado, // Request
          array('coment_vent') // Nombre de los campos en la BD
        ); 
        $armado->updated_at_ped_arm  = Auth::user()->email_registro;
      }

      $armado->save();
      DB::commit();
      return $armado;
    } catch(\Exception $e) { DB::rollback(); throw $e; }
  }
}