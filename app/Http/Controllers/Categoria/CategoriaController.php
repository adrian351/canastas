<?php

namespace App\Http\Controllers\Categoria;

use Illuminate\Http\Request;
use App\Models\Categoria;
use App\Http\Controllers\Controller;
// use App\Http\Controllers\SubCategoria\SubCategoriaController;
use DB;

class CategoriaController extends Controller{

    // protected $categoriaRepo;

    // public function __construct(SuBCategoriaController $subcategoriaController){
    //     $this->subcategoriaRepo = $subcategoriaController;
    // }

    public function index(){
        $todos= Categoria::all();
        return view('categoria.index', compact('todos'));
    }
    public function Only_Categorias(){
        return Categoria::all();
        
    }

    public function all_Categorias(){

        $todos = Categoria::all();        
        return view('categoria.index', compact('todos'));
    }

    public function create(){
        return view('categoria.create');
    }
    public function store(Request $request){
        try{ DB::begintransaction();
            
        
            if($request['categoria']==''){// validar que el campo categoria tenga dato
                // si categoria esta vacio -> no hacemos nada 

            }else{

                $categoria= new Categoria();
                $categoria-> categoria = $request['categoria'];

                if ($request['descripcion'] != null||$request['descripcion']!=''){
                    $categoria->descripcion = $request['descripcion'];
                }else{
                    $categoria->descripcion ='Sin descripción';
                }

                $categoria->save(); 

            }

            DB::commit();
            
            return $this->all_Categorias();

        } catch(\Exception $e) { DB::rollback(); throw $e;}
    }

   
    public function edit(Categoria $categoria){
        // dd($categoria);
        return view('categoria.edit', compact('categoria'));
    }
    
    public function update(Request $request, $id){
        DB::transaction(function () use ($request, $id){
            // validar si la categoria es nula
            $categoriaIn = Categoria::find($id);
            $categoriaIn->categoria = $request->categoria;
            $categoriaIn->descripcion = $request->descripcion;
            $categoriaIn->save();
        });
            return $this->all_Categorias();
    }


    public function delete($id){
        try{ DB::beginTransaction();
            
        
            $categoria = Categoria::findorFail($id);

            $categoria->subCategoria()->detach();
            $categoria->producto()->detach();
            $categoria->delete();

            DB::commit();
            return $this->all_Categorias();
        } catch(\Exception $e) { DB::rollback(); throw $e;}
    }

}
