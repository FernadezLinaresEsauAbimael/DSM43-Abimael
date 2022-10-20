<?php

namespace App\Http\Controllers;

use App\Models\Tiendas;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Storage; 

class TiendasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $datos['tiendas']=Tiendas::paginate(20); 
        return view('tienda.index',$datos );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('tienda.create'); 
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
            'foto'=>'required|max:10000|mimes:jpeg,png,jpg'
        ]; 

        $mensaje=[
            'required'=>'El :attribute es requerido',
            'foto.required'=>'La foto es requerida',
            'clave.required'=>'La clave es requerida'
        ];

        $this->validate($request, $campos, $mensaje);


        //$datosTienda = $request->all(); 
        $datosTienda = $request->except('_token'); 

        if($request->hasFile('foto')) {
            $datosTienda['foto']=$request->file('foto')->store('uploads','public');
        } 

        Tiendas::insert($datosTienda); 

        //return response()->json($datosTienda);
        return redirect('tienda')->with('mensaje','Tienda agregada con exito');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Tiendas  $tiendas
     * @return \Illuminate\Http\Response
     */
    public function show(Tiendas $tiendas)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Tiendas  $tiendas
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $tienda=Tiendas::findOrfail($id); 
        return view('tienda.edit', compact('tienda') ); 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Tiendas  $tiendas
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $datosTienda = request()->except(['_token','_method']);
        
        if($request->hasFile('foto')) {

            $tienda=Tiendas::findOrfail($id);

            Storage::delete(['public/'.$tienda->foto]);

            $datosTienda['foto']=$request->file('foto')->store('uploads','public');
        } 

        Tiendas::where('id','=',$id)->update($datosTienda);  

        $tienda=Tiendas::findOrfail($id); 
        //return view('tienda.edit', compact('tienda') ); 

        return redirect('tienda')->with('mensaje','Tienda Modificada');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tiendas  $tiendas
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $tienda=Tiendas::findOrfail($id);

        if(Storage::delete('public/'.$tienda->foto)) {

            Tiendas::destroy($id); 

        }

      
        return redirect('tienda')->with('mensaje','Tienda Eliminada');
    }
}
