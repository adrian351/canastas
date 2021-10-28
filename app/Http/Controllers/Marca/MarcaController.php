<?php

namespace App\Http\Controllers\Marca;

use App\Models\Email;
use App\Models\Marca;
use App\Models\Dominio;
use App\Models\Telefono;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use DB;

class MarcaController extends Controller
{
    public function index(){
        $todo = Marca::paginate()->get();
        return view('marcas.index', compact('todo'));
    }

    private function datosMarca(){

         return Marca::where('id','!=','0')
        ->with('email')
        ->with('dominio')
        ->with('telefono')
        ->get();


    }
    public function Only_Marcas(){
        return Marca::all();
        // $datos = Marca (['marca']);

        // $dato = $datos->pluck('marca');

        // $dato->all();
    }
    public function All_Marcas(){
        // retornamos la tabla con todos las marcas
        $todo = $this->datosMarca();
    
        return view('marcas.index', compact('todo'));
    }

    public function create(){
        return view('marcas.create');
    }

    public function store(Request $request){

        try{ DB::beginTransaction();
            // validacion de back
            if($request['marca']==''){// validar que el campo marca tenga datos

                // si marca esta vacio -> no hacemos nada 
            
                //     'marca' => 'required',
                    
                // ];

            }else{
                $marcaIn = new Marca();
                $marcaIn->marca = $request['marca']; 
                $marcaIn->razon_social = $request['razon_social'];
                if($request['razon_social'] == null){
                    return 'El campo razon social no puede ser nulo , volver'; 
                    
                }
                $marcaIn->save();


                $this->addtelefono($request,$marcaIn);

                $dominio = new Dominio();           
                if($request['dominio'] == null){
                    // si el usuario no ingresa un dominio , no se hace nada
                }else{
                
                    $dominio->dominio = $request['dominio'];
                    $dominio->save();
                }

                $email = new Email();
                if($request['email'] == null){

                }else{
                    $email->email = $request['email'];
                    $email->save();
                }
                $marca = Marca::findOrFail($marcaIn->id);
                $marca->email()->attach($email->id);
                $marca->dominio()->attach($dominio->id);
                // $marca->addtelefono()->attach($request->id);
            }

            DB::commit();

            return $this->All_Marcas();

        } catch(\Exception $e) { DB::rollback(); throw $e;}
    }

    private function addtelefono($request,$model){
        // validaciones telefono
        if(!empty($request['telefono'])){
        $telefono= new Telefono();
            $telefono->telefono = $request['telefono'];       
            $telefono->tipo = 'local';
            $telefono->save();
            $model->telefono()->attach($telefono->id);
        }
        if(!empty($request['whats_app'])){
        $whats= new Telefono();
            $whats->telefono = $request['whats_app'];
            $whats->tipo = 'whats_app';
            $whats->save();
            $model->telefono()->attach($whats->id);

        }

    }
    public function edit(Marca $marca){
        // dd($marca);
        return view('marcas.edit', compact('marca'));
    }
    
    public function update(Request $request, $id){

        DB::transaction(function () use ($request, $id){
            
       
            // dd($request->all());
            $marcaIn = Marca::find($id);
            $marcaIn->marca = $request->marca;
            $marcaIn->razon_social = $request->razon_social;
            $marcaIn->save();
            ///termina la marca
            
            //inicia dominicio
            if($request->dominio_id!=0){
                $dominio = Dominio::find($request->dominio_id);

                if(empty($request->dominio)){
                    $marcaIn->dominio()->detach($dominio->id);  ///elimina la relacion, marca_has_dominio
                    $dominio->delete();//  elimina el modelo 
                }else{
                    // se guarda la marca sin un dominio
                    $dominio->dominio = $request->dominio;
                    $dominio->save();             
                }
                    
            }else{
                // 
                if(!empty($request->dominio)){
                    // si la marca no tiene dominio, creamos uno nuevo
                    $domNuevo= new Dominio;
                    $domNuevo->dominio= $request->dominio;
                    $domNuevo->save();
                    $marcaIn->dominio()->attach($domNuevo->id);
                }
        
            }


            // inicia email
            if($request->email_id!=0){
                $email = Email::find($request->email_id);

                if(empty($request->email)){ //se elimina la relacion
                    $marcaIn->email()->detach($email->id);
                    $email->delete(); 
                
                }else{
                    // se guarda la marca sin un email
                    $email->email = $request->email;
                    $email->save();
                }
            }else{
                if(!empty($request->email)){
                    // si no hay un email en el registro, agregamos uno nuevo
                    $emailNuevo= new Email;
                    $emailNuevo->email= $request->email;
                    $emailNuevo->save();
                    $marcaIn->email()->attach($emailNuevo->id);
                }
            }
            if($request->telefono_id!=0){
                $telefono = Telefono::find($request->telefono_id);

                if(empty($request->telefono)){
                    $marcaIn->telefono()->detach($telefono->id);
                    $telefono->delete();

                }else{
                    $telefono->telefono = $request->telefono;
                    $telefono->tipo = 'local';

                    $telefono->save();
                }        
            }else{
                if(!empty($request->telefono)){
                // si no hay telefono en el registro, agregamos uno nuevo
                    $telefonoNuevo= new Telefono;
                    $telefonoNuevo->telefono= $request->telefono;
                    $telefonoNuevo->tipo='local';
                    $telefonoNuevo->save();
                    $marcaIn->telefono()->attach($telefonoNuevo->id);
                }
            }
            if($request->whats_app_id!=0){
                $whats = Telefono::find($request->whats_app_id);

                if(empty($request->whats_app)){
                    $marcaIn->telefono()->detach($whats->id);
                    $whats->delete();

                }else{
                    $whats->telefono = $request->whats_app;
                    $whats->tipo ='whats_app';
                    $whats->save(); 
                }       

            }else{
                if(!empty($request->whats_app)){

                    $whatsNuevo= new Telefono;
                    $whatsNuevo->telefono= $request->whats_app;
                    $whatsNuevo->tipo = 'whats_app';
                    $whatsNuevo->save();
                    $marcaIn->telefono()->attach($whatsNuevo->id);
                }
            }

           
        }); return $this->All_Marcas();
    }


    public function delete($id){

        try { DB::beginTransaction();
            
        
            $marca = Marca::findorFail($id);
            $marca->telefono()->delete();
            $marca->dominio()->delete();
            $marca->email()->delete();
            // $marca->logotipo()->delete();
            $marca->armados()->detach();
            $marca->delete();

            DB::commit();

            return $this->All_Marcas(); 
            // toastr()->success('¡Material eliminado exitosamente!'); 
        } catch(\Exception $e) { DB::rollback(); throw $e;}
    }
    // pasamos la lista de las relaciones de marca-armado
    public function byMarcas($armado_id){
    //    $data=Marca::findorfail($armado_id);
    //    return response()->json(['data'=>$data->armados()->get()]);

        $d = Marca::findorfail($armado_id);
        return response($d->armados()->get());
    }

    // public function byMarcas($id) 
    // {
        // return Armado::findOrFail($id)->get();
        // return Armado::findOrFail($id)->with('marca')->get();
        // return Marca::findOrFail($id)->with('armados')->get();
        
    // }
}
