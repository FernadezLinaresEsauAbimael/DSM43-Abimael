<?php

namespace App\Http\Controllers;

use App\Models\Tiendas;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Storage; 

class TiendasController extends Controller
{
    public function productos()
    {
        $produc_a = Productos::all();
        $produc_b = \DB::select('SELECT * FROM tiendas');
        return view("lista_productos")
        -> with(['productos1' => $produc_a])
        -> with(['productos2' => $produc_b]);
    }
    
    public function editar_productos(Productos $id){
    
        $tipo = Tipos::all();
    return view("editar_productos")
    ->with(['usuarios' => $id]) 
    ->with(['nivel' => $tipo]);
    }
    public function salvar_productos(Productos $id, Request $request){
        $foto2 =  $request ->foto;
        $query = Productos::find($id->id_producto);
        $query->clave = trim(  $request->clave);
        $query->nombre = trim(  $request->nombre);
        $iniciales =  $query->cantidad ;
    
        if(isset($request->insumos)){
            $insumo =  $request->insumos;
            $real = $iniciales  -  $insumo;
        }
        elseif(isset($request->ingresos)){
            $ingreso =  $request->ingresos;
            $real = $iniciales  +  $ingreso;
        }
    
        $query->cantidad = $real;
        $query->nombre = trim(  $request->nombre);
        $query->foto = $foto2;
       
        $query->save();
        return redirect()->route("editar_productos", ['id' => $id->id_producto]);
    
    }
    public function borrar_productos(Productos $id){
    
        \Storage::disk('local')->delete($id->foto);//bay foto del usuario
       $id->delete();
       return redirect()->route("lista_productos");
    
    }
    public function detalle_productos($id){
        $usuario = Productos::find($id);
        return view("detalle_productos")
        ->with(['detalle_productos' => $usuario]);
    }
}
