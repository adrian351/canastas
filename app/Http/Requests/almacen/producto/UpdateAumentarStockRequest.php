<?php
namespace App\Http\Requests\almacen\producto;
use Illuminate\Foundation\Http\FormRequest;

class UpdateAumentarStockRequest extends FormRequest {
  public function authorize() {
    return true;
  }
  public function rules() {
    return [
      'aumentar_stock' => 'required|min:1|max:99999999|integer'
    ];
  }
}