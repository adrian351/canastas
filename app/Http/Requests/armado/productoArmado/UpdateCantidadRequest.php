<?php
namespace App\Http\Requests\armado\productoArmado;
use Illuminate\Foundation\Http\FormRequest;

class UpdateCantidadRequest extends FormRequest {
  public function authorize() {
    return true;
  }
  public function rules() {
    return [
      'cantidad'    => 'required|in:1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20',
    ];
  }
}