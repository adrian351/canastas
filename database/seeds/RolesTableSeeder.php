<?php
use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder {
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run() {
    $rolEspecialFerro = Spatie\Permission\Models\Role::create([
      'id'              => 0,
      'nom'				      => 'Transportes Ferro',
      'name'            => 'transportesFerro',
      'desc'            => "Acceso especial como Transportes Ferro",
      'asignado_rol'    => 'desarrolloweb.ewmx@gmail.com',
      'created_at_rol'  => 'desarrolloweb.ewmx@gmail.com',
    ]);
    $rolEspecialFerro->syncPermissions([21]);
    $rolPruebas = Spatie\Permission\Models\Role::create([
      'nom'				      => 'Pruebas',
      'name'            => 'pruebas',
      'desc'            => "Rol para realizar pruebas",
      'asignado_rol'    => 'desarrolloweb.ewmx@gmail.com',
      'created_at_rol'  => 'desarrolloweb.ewmx@gmail.com',
    ]);
    $rolEspecialCliente = Spatie\Permission\Models\Role::create([
      'nom'				      => 'Cliente',
      'name'            => 'cliente',
      'desc'            => "Acceso especial como cliente",
      'asignado_rol'    => 'desarrolloweb.ewmx@gmail.com',
      'created_at_rol'  => 'desarrolloweb.ewmx@gmail.com',
    ]);
    $rolEspecialCliente->syncPermissions([21]);
    $rolDesarrollador = Spatie\Permission\Models\Role::create([
      'nom'				      => 'Desarrollador',
      'name'				    => 'desarrollador',
      'desc'            => 'Administrador de todo el sistema',
      'asignado_rol'    => 'desarrolloweb.ewmx@gmail.com',
      'created_at_rol'	=> 'desarrolloweb.ewmx@gmail.com',
    ]);
    $rolSinAcceso = Spatie\Permission\Models\Role::create([
      'nom'				      => 'Sin acceso al sistema',
      'name'				    => 'sinAccesoAlSistema',
      'desc'            => 'No tiene permiso de acceder al sistema',
      'asignado_rol'    => 'desarrolloweb.ewmx@gmail.com',
      'created_at_rol'	=> 'desarrolloweb.ewmx@gmail.com',
    ]);
    $rolLogs = Spatie\Permission\Models\Role::create([
      'nom'				      => 'Administrador de logs',
      'name'				    => 'adminDeLogs',
      'desc'            => "Acceso a todo el m??dulo de 'Logs'",
      'asignado_rol'    => 'desarrolloweb.ewmx@gmail.com',
      'created_at_rol'	=> 'desarrolloweb.ewmx@gmail.com',
    ]);
    $rolLogs->syncPermissions([1]);
    $rolSistema = Spatie\Permission\Models\Role::create([
      'nom'				        => 'Administrador de sistema',
      'name'              => 'adminDeSistema',
      'desc'              => "Acceso a todo el m??dulo de 'Sistema'",
      'asignado_rol'      => 'desarrolloweb.ewmx@gmail.com',
      'created_at_rol'    => 'desarrolloweb.ewmx@gmail.com',
    ]);
    $rolSistema->syncPermissions([2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19]);
    $rolEmpresa = Spatie\Permission\Models\Role::create([
      'nom'				      => "Administrador de sistema 'Nombre de la empresa'",
      'name'            => 'adminDeSistemaNombreDeLaEmpresa',
      'desc'            => "Acceso a todo el m??dulo de Sistema 'Nombre de la empresa'",
      'asignado_rol'    => 'desarrolloweb.ewmx@gmail.com',
      'created_at_rol'  => 'desarrolloweb.ewmx@gmail.com',
    ]);
    $rolEmpresa->syncPermissions([2]);
    $rolPlantilla = Spatie\Permission\Models\Role::create([
      'nom'				      => "Administrador de sistema 'PLantillas'",
      'name'            => 'adminDeSistemaPLantillas',
      'desc'            => "Acceso a todo el m??dulo de Sistema 'PLantillas'",
      'asignado_rol'    => 'desarrolloweb.ewmx@gmail.com',
      'created_at_rol'  => 'desarrolloweb.ewmx@gmail.com',
    ]);
    $rolPlantilla->syncPermissions([3,4,5,6,7]);
    $rolNotificaciones = Spatie\Permission\Models\Role::create([
      'nom'				      => "Administrador de sistema 'Enviar notificaci??n'",
      'name'            => 'adminDeSistemaEnviarNotificacion',
      'desc'            => "Acceso a todo el m??dulo de Sistema 'Enviar notificaci??n'",
      'asignado_rol'    => 'desarrolloweb.ewmx@gmail.com',
      'created_at_rol'  => 'desarrolloweb.ewmx@gmail.com',
    ]);
    $rolNotificaciones->syncPermissions([8]);
    $rolActividades = Spatie\Permission\Models\Role::create([
      'nom'				        => "Administrador de sistema 'Registro de actividades'",
      'name'              => 'adminDeSistemaRegistroDeActividades',
      'desc'              => "Acceso a todo el m??dulo de Sistema 'Registro de actividades'",
      'asignado_rol'      => 'desarrolloweb.ewmx@gmail.com',
      'created_at_rol'    => 'desarrolloweb.ewmx@gmail.com',
    ]);
    $rolActividades->syncPermissions([9]);
    $rolCatalogos = Spatie\Permission\Models\Role::create([
      'nom'				        => "Administrador de sistema 'Cat??logos'",
      'name'              => 'adminDeSistemaCatalogos',
      'desc'              => "Acceso a todo el m??dulo de Sistema 'Cat??logos'",
      'asignado_rol'      => 'desarrolloweb.ewmx@gmail.com',
      'created_at_rol'    => 'desarrolloweb.ewmx@gmail.com',
    ]);
    $rolCatalogos->syncPermissions([10,11,12,13,14]);
    $rolSeries = Spatie\Permission\Models\Role::create([
      'nom'				      => "Administrador de sistema 'Series'",
      'name'            => 'adminDeSistemaSeries',
      'desc'            => "Acceso a todo el m??dulo de Sistema 'Series'",
      'asignado_rol'    => 'desarrolloweb.ewmx@gmail.com',
      'created_at_rol'  => 'desarrolloweb.ewmx@gmail.com',
    ]);
    $rolSeries->syncPermissions([15,16,17,18,19]);
    $rolQYS = Spatie\Permission\Models\Role::create([
      'nom'				      => 'Administrador de quejas y sugerencias',
      'name'				    => 'adminDeQuejasYSugerencias',
      'desc'            => "Acceso a todo el m??dulo de 'Quejas y sugerencias'",
      'asignado_rol'    => 'desarrolloweb.ewmx@gmail.com',
      'created_at_rol'  => 'desarrolloweb.ewmx@gmail.com',
    ]);
    $rolQYS->syncPermissions([20,21,22]);
    $rolUsuarios = Spatie\Permission\Models\Role::create([
      'nom'				      => 'Administrador de usuarios',
      'name'				    => 'adminDeDsuarios',
      'desc'            => "Acceso a todo el m??dulo de 'Usuarios'",
      'asignado_rol'    => 'desarrolloweb.ewmx@gmail.com',
      'created_at_rol'	=> 'desarrolloweb.ewmx@gmail.com',
    ]);
    $rolUsuarios->syncPermissions([23,24,25,26,27]);
    $rolCliente = Spatie\Permission\Models\Role::create([
      'nom'				      => 'Administrador de clientes',
      'name'				    => 'adminDeClientes',
      'desc'            => "Acceso a todo el m??dulo de 'Clientes'",
      'asignado_rol'    => 'desarrolloweb.ewmx@gmail.com',
      'created_at_rol'  => 'desarrolloweb.ewmx@gmail.com',
    ]);
    $rolCliente->syncPermissions([28,29,30,31,32]);
    $rolRoles = Spatie\Permission\Models\Role::create([
      'nom'				      => 'Administrador de roles',
      'name'				    => 'adminDeRoles',
      'desc'            => "Acceso a todo el m??dulo de 'Roles'",
      'asignado_rol'    => 'desarrolloweb.ewmx@gmail.com',
      'created_at_rol'  => 'desarrolloweb.ewmx@gmail.com',
    ]);
    $rolRoles->syncPermissions([33,34,35,36,37,38]);
    $rolPapelera = Spatie\Permission\Models\Role::create([
      'nom'				      => 'Administrador de papelera de reciclaje',
      'name'				    => 'adminDePapeleraDeReciclaje',
      'desc'            => "Acceso a todo el m??dulo de 'Papelera de reciclaje'",
      'asignado_rol'    => 'desarrolloweb.ewmx@gmail.com',
      'created_at_rol'  => 'desarrolloweb.ewmx@gmail.com',
    ]);
    $rolPapelera->syncPermissions([39,40,41]);
/*
* ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
* +++++++++++++++++++++++++++++++++++++++++ M??DULOS
* ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
*/
    $rolPagos = Spatie\Permission\Models\Role::create([
      'nom'				      => 'Administrador de pagos',
      'name'				    => 'adminDePagos',
      'desc'            => "Acceso a todo el m??dulo de 'Pagos'",
      'asignado_rol'    => 'desarrolloweb.ewmx@gmail.com',
      'created_at_rol'	=> 'desarrolloweb.ewmx@gmail.com',
    ]);
    $rolPagos->syncPermissions([]);
    $rolCotizaciones = Spatie\Permission\Models\Role::create([
      'nom'				      => 'Administrador de cotizaciones',
      'name'				    => 'adminDeCotizaciones',
      'desc'            => "Acceso a todo el m??dulo de 'Cotizaciones'",
      'asignado_rol'    => 'desarrolloweb.ewmx@gmail.com',
      'created_at_rol'	=> 'desarrolloweb.ewmx@gmail.com',
    ]);
    $rolCotizaciones->syncPermissions([]);
    $rolProveedores = Spatie\Permission\Models\Role::create([
      'nom'				      => 'Administrador de proveedores',
      'name'				    => 'adminDeProveedores',
      'desc'            => "Acceso a todo el m??dulo de 'Proveedores'",
      'asignado_rol'    => 'desarrolloweb.ewmx@gmail.com',
      'created_at_rol'	=> 'desarrolloweb.ewmx@gmail.com',
    ]);
    $rolProveedores->syncPermissions([]);
    $rolArmados = Spatie\Permission\Models\Role::create([
      'nom'				      => 'Administrador de armados',
      'name'				    => 'adminDeArmados',
      'desc'            => "Acceso a todo el m??dulo de 'Armados'",
      'asignado_rol'    => 'desarrolloweb.ewmx@gmail.com',
      'created_at_rol'	=> 'desarrolloweb.ewmx@gmail.com',
    ]);
    $rolArmados->syncPermissions([]);
    $rolVentas = Spatie\Permission\Models\Role::create([
      'nom'				      => 'Administrador de ventas',
      'name'				    => 'adminDeVentas',
      'desc'            => "Acceso a todo el m??dulo de 'Ventas'",
      'asignado_rol'    => 'desarrolloweb.ewmx@gmail.com',
      'created_at_rol'	=> 'desarrolloweb.ewmx@gmail.com',
    ]);
    $rolVentas->syncPermissions([]);
    $rolAlmacen = Spatie\Permission\Models\Role::create([
      'nom'				      => 'Administrador de almac??n',
      'name'				    => 'adminDeAlmacen',
      'desc'            => "Acceso a todo el m??dulo de 'Almac??n'",
      'asignado_rol'    => 'desarrolloweb.ewmx@gmail.com',
      'created_at_rol'	=> 'desarrolloweb.ewmx@gmail.com',
    ]);
    $rolAlmacen->syncPermissions([]);
    $rolProduccion = Spatie\Permission\Models\Role::create([
      'nom'				      => 'Administrador de producci??n',
      'name'				    => 'adminDeProduccion',
      'desc'            => "Acceso a todo el m??dulo de 'Producci??n'",
      'asignado_rol'    => 'desarrolloweb.ewmx@gmail.com',
      'created_at_rol'	=> 'desarrolloweb.ewmx@gmail.com',
    ]);
    $rolProduccion->syncPermissions([]);
    $rolLogistica = Spatie\Permission\Models\Role::create([
      'nom'				      => 'Administrador de log??stica',
      'name'				    => 'adminDeLogistica',
      'desc'            => "Acceso a todo el m??dulo de 'Log??stica'",
      'asignado_rol'    => 'desarrolloweb.ewmx@gmail.com',
      'created_at_rol'	=> 'desarrolloweb.ewmx@gmail.com',
    ]);
    $rolLogistica->syncPermissions([]);
    $rolFacturacion = Spatie\Permission\Models\Role::create([
      'nom'				      => 'Administrador de facturaci??n',
      'name'				    => 'adminDeFacturacion',
      'desc'            => "Acceso a todo el m??dulo de 'Facturaci??n'",
      'asignado_rol'    => 'desarrolloweb.ewmx@gmail.com',
      'created_at_rol'	=> 'desarrolloweb.ewmx@gmail.com',
    ]);
    $rolFacturacion->syncPermissions([]);
    $rolSoporte = Spatie\Permission\Models\Role::create([
      'nom'				      => 'Administrador de soporte',
      'name'				    => 'adminDeSoporte',
      'desc'            => "Acceso a todo el m??dulo de 'Soportes'",
      'asignado_rol'    => 'desarrolloweb.ewmx@gmail.com',
      'created_at_rol'	=> 'desarrolloweb.ewmx@gmail.com',
    ]);
    $rolSoporte->syncPermissions([]);
    $rolInventario = Spatie\Permission\Models\Role::create([
      'nom'				      => 'Administrador de inventario',
      'name'				    => 'adminDeInventario',
      'desc'            => "Acceso a todo el m??dulo de 'Inventario'",
      'asignado_rol'    => 'desarrolloweb.ewmx@gmail.com',
      'created_at_rol'	=> 'desarrolloweb.ewmx@gmail.com',
    ]);
    $rolInventario->syncPermissions([]);
  }
}
