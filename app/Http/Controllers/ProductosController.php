<?php

namespace App\Http\Controllers;

use App\Models\Productos;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Storage;

class ProductosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $datos['productos']=Productos::paginate(20); 
        return view('producto.index',$datos ); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('producto.create'); 
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $campos=[
            'clave'=>'required|string|max:100',
            'nombre'=>'required|string|max:100',
            'cantidad'=>'required|string|max:100',
            'costo'=>'required|string|max:1000',
            'id_tipo'=>'required|integer',
            'id_tienda'=>'required|integer',
            'foto'=>'required|max:10000|mimes:jpeg,png,jpg',
            'activo'=>'required|boolean|max:100'
        ]; 

        $mensaje=[
            'required'=>'El :attribute es requerido',
            'foto.required'=>'La foto es requerida',
            'clave.required'=>'La clave es requerida',
            'cantidad.required'=>'La cantidad es requerida'
        ];

        $this->validate($request, $campos, $mensaje);


        //$datosProducto = $request->all(); 
        $datosProducto = $request->except('_token'); 

        if($request->hasFile('foto')) {
            $datosProducto['foto']=$request->file('foto')->store('uploads','public');
        } 

        Productos::insert($datosProducto); 

        //return response()->json($datosProducto);
        return redirect('producto')->with('mensaje','Producto agregado con exito');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Productos  $productos
     * @return \Illuminate\Http\Response
     */
    public function show(Productos $productos)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Productos  $productos
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $producto=Productos::findOrfail($id); 
        return view('producto.edit', compact('producto') ); 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Productos  $productos
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $datosProducto = request()->except(['_token','_method']);
        
        if($request->hasFile('foto')) {

            $producto=Productos::findOrfail($id);

            Storage::delete(['public/'.$producto->foto]);

            $datosProducto['foto']=$request->file('foto')->store('uploads','public');
        } 

        Productos::where('id','=',$id)->update($datosProducto);  

        $producto=Productos::findOrfail($id); 
        //return view('usuario.edit', compact('usuario') ); 

        return redirect('producto')->with('mensaje','Producto Modificado');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Productos  $productos
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $producto=Productos::findOrfail($id);

        if(Storage::delete('public/'.$producto->foto)) {

            Productos::destroy($id); 

        }

      
        return redirect('producto')->with('mensaje','Producto Eliminado');
    }
}
