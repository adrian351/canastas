<?php

namespace App\Http\Controllers\SubCategoria;

use Illuminate\Http\Request;
use App\Models\SubCategoria;
use App\Http\Controllers\Categoria\CategoriaController;
use App\Http\Controllers\Controller;
use DB;
class SubCategoriaController extends Controller{

    protected $categoriaRepo;

    public function __construct(CategoriaController $categoriaController){
        $this->categoriaRepo = $categoriaController;
    }

    public function index(){
        $todos = SubCategoria::paginate()->get();
        // $categoria_list = $this->categoriaRepo->Only_Categorias();
        return view('subCategoria.index', compact('todos'));
        // , 'categoria_list'
    }

    public function create(){

        $categoria_list = $this->categoriaRepo->Only_Categorias();
        return view('subCategoria.create', compact('categoria_list'));
    }

    public function Only_SubCategorias(){
        return SubCategoria::all();
    }
    public function all_subCategorias(){

        $todos = SubCategoria::all();        
        return view('subCategoria.index', compact('todos'));
    }

    public function store(Request $request){
        try{ DB::beginTransaction();
            // dd($request);
            if($request['subcategoria']== ''){// validar que el campo subcategoria tenga dato
                // si subcategoria esta vacio -> no hacemos nada 

            }else{

                $sub_categoria= new SubCategoria();
                $sub_categoria-> subcategoria = $request['subcategoria'];
                // $sub_categoria-> descripcion = $request['descripcion'];

                //  si no hay una descripcion
                // if ( $sub_categoria-> descripcion = $request['descripcion'] == 0){
                    
                // }else{
                    // $sub_categoria->descripcion = $request['descripcion'];
                // }
                if ($request['descripcion'] != null||$request['descripcion']!=''){
                    $sub_categoria->descripcion = $request['descripcion'];
                }else{
                    $sub_categoria->descripcion ='Sin descripción';
                }
            
            
                $sub_categoria->save(); 
            
            
                $sub_categoria->categoria()->detach();
                if ($request->categoria[0]  !=  null) {
                    $sub_categoria->categoria()->sync($request->categoria);
                }else{
        
                }
            } 

            DB::commit();
            return $this->all_subCategorias();
        }catch(\Exception $e) { DB::rollback(); throw $e;}
    }

   
    public function edit(SubCategoria $sub_categoria){
        // dd($sub_categoria);
        $categoria_list = $this->categoriaRepo->Only_Categorias();
        return view('subCategoria.edit', compact('sub_categoria', 'categoria_list'));
    }
    
    public function update(Request $request, $id){
        DB::transaction(function () use ($request, $id){
            // dd($request);
            $sub_categoriaIn = SubCategoria::find($id);
            $sub_categoriaIn->subcategoria = $request->subcategoria;
            $sub_categoriaIn->descripcion = $request->descripcion;
            $sub_categoriaIn->save();

            $sub_categoriaIn->categoria()->detach();
            if ($request->categoria[0]  !=  null) {
                $sub_categoriaIn->categoria()->sync($request->categoria);
            }else{
    
                }
            
        });  return $this->all_subCategorias();
    }


    public function delete($id){
        try{ DB::beginTransaction();
            $sub_categoria = SubCategoria::findorFail($id);

            $sub_categoria->categoria()->detach();
            $sub_categoria->producto()->detach();
            $sub_categoria->delete();

            DB::commit();
            return $this->all_subCategorias();

        } catch(\Exception $e) { DB::rollback(); throw $e;}
    }

}