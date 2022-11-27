<?php

namespace App\Http\Controllers;

use App\Models\Ventas;
use Illuminate\Http\Request;
use App\Models\Empleados; 
use App\Models\Maquinas; 

class VentasController extends Controller
{

    public function registrar(request $REQUEST){

        ventas::create(array(
            'empleado' => $REQUEST -> input('empleado'),
            'maquina' => $REQUEST -> input('maquina'),
            'costo' => $REQUEST -> input('costo'),
            'cantidad' => $REQUEST -> input('cantidad'),

        ));
            return redirect()->route("inicio") ;
        }

        
    public function inicio(){
        $tipo = Empleados::all();
        $maquinas    = Maquinas::all();
        $ven    = Ventas::all();
        $reinicio = \DB::select('SELECT id_venta FROM ventas LIMIT 1;');

        $total = \DB::select('SELECT SUM(v.costo * v.cantidad) as total from ventas as v, maquinas as m WHERE v.maquina = m.nombre');
        $sub = \DB::select('SELECT SUM((v.costo * v.cantidad)-((v.costo * v.cantidad)*e.descuento)) as sub from empleados as e,ventas as v, maquinas as m WHERE v.maquina = m.nombre AND e.nombre = v.empleado');

$costo = \DB::select('SELECT m.costo as costo
          FROM maquinas as m ,ventas as v  WHERE m.costo = v.costo and m.id_maquina = v.id_venta');
          $descuento = \DB::select('SELECT SUM(v.costo * v.cantidad) as total from ventas as v, maquinas as m WHERE v.maquina = m.nombre');
       
        return view("inicio")
        ->with(['tipos' => $tipo])
        ->with(['maqui' => $maquinas])
        ->with(['ventitas' => $ven])
        ->with(['co' => $costo])
        ->with(['t' => $total])
        ->with(['sub' => $sub])
        ->with(['super' => $reinicio]);
//
    } 
   

    public function borrar(Ventas $id){

       $id->delete();
       return redirect()->route("inicio");
    
    }

}