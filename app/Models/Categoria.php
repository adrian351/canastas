<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\SubCategoria;

class Categoria extends Model
{
    protected $table = 'categorias';

    public function subCategoria(){
        return $this->belongsToMany(SubCategoria::class, 'categorias_has_subcategorias', 'categoria_id', 'sub_categoria_id');
    }

    public function producto(){
        return $this->belongsToMany(Producto::class, 'producto_has_categoria', 'categoria_id', 'producto_id');
    }

}
