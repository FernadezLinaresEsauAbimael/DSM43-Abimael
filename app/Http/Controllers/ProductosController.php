<?php

namespace App\Http\Controllers;

use App\Models\Productos;
use Illuminate\Http\Request;

//agregamos
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\DB; 


class ProductosController extends Controller
{

    function __construct() 
    {
        $this->middleware('permission:ver-productos|crear-productos|editar-productos|borrar-productos')->only('index');
        $this->middleware('permission:crear-productos', ['only'=>['create','store']]);
        $this->middleware('permission:editar-productos', ['only'=>['edit','update']]);
        $this->middleware('permission:borrar-productos', ['only'=>['destroy']]);
    }

    

    public function index()
    {
        //
        $productos= Productos::paginate(5); 
        return view('producto.index', compact('productos') ); 
    }

    public function create()
    {
        //
        return view('producto.create'); 
    }


    public function store(Request $request)
    {
        //
        request()->validate([
            'clave'=>'required',
            'imagen' => 'required|imagen|mimes:jpeg,png,svg|max:2048',
            'nombre'=>'required',
            'cantidad'=>'required',
            'costo'=>'required',
        ]); 
 
       $input = $request->all();

       if ($imagen = $request->file('imagen')) {
           $destinationPath = 'Archivos/'; 
           $profileImagen = date('YmdHis') . "." . $imagen->getClientOriginalExtension();
           $image->move($destinationPath, $profileImagen);
           $input['imagen'] = "$profileImagen"; 
       }

       Producto::create($input); 

       return redirect()->route('index');

        //Producto::create($request->all());
        //Producto::create($input); 
        //return redirect()->route('producto.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
        $producto=Productos::findOrfail($id); 
        return view('producto.edit', compact('producto')); 
    }


    public function update(Request $request, Productos $producto)
    {
        //

      /*   request()->validate([
            'clave'=>'required|string|max:100',
            'imagen' => 'required|imagen|mimes:jpeg,png,svg|max:2048',
            'nombre'=>'required|string|max:100',
            'cantidad'=>'required|string|max:100',
            'costo'=>'required|string|max:1000',
        ]);  */

       // $producto->update($request->all());
       $query = Productos::find($producto->id);
       $query->id = trim(  $request->id);
       $query->clave = trim(  $request->clave);
       $foto2 =  $request ->imagen;
   
       $query->nombre = trim(  $request->nombre);
       $query->costo = trim(  $request->costo);
   
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
       $query->imagen = $foto2;
      
       $query->save();
        return redirect()->route('producto.index'); 
    }


    public function destroy($id)
    {
        //
        /*
        $producto=Productos::findOrfail($id);

        if(Storage::delete('public/'.$producto->foto)) {

            Productos::destroy($id); 

        }
        */

        Productos::destroy($id); 
      
        return redirect()->route('producto.index');
    }
}
