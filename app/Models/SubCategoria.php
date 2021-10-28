<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Categoria;
 use App\Models\Producto;

class SubCategoria extends Model
{
    protected $table = 'sub_categorias';

    public function categoria(){
        return $this->belongsToMany(Categoria::class, 'categorias_has_subcategorias', 'sub_categoria_id', 'categoria_id');
      }
      public function producto(){
        return $this->belongsToMany(Producto::class, 'producto_has_subcategoria', 'subcategoria_id', 'producto_id');
    }
}
