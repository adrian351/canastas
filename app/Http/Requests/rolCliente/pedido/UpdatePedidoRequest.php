<?php
namespace App\Http\Requests\rolCliente\pedido;
use Illuminate\Foundation\Http\FormRequest;

class UpdatePedidoRequest extends FormRequest {
  public function authorize() {
    return true;
  }
  public function rules() {
    return [
      'fecha_de_entrega'        => 'required|date',
      'se_puede_entregar_antes' => 'required|in:Si,No',
      'cuantos_dias_antes'      => 'nullable|required_if:se_puede_entregar_antes,Si|max:999|min:1|integer',
      'comentarios'             => 'nullable|max:30000|string',
    ];
  }
}