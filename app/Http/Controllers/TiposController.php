<?php

namespace App\Http\Controllers;

use App\Models\Tipos;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Storage;

class TiposController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $datos['tipos']=Tipos::paginate(2); 
        return view('tipo.index',$datos ); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('tipo.create');
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
            'nombre'=>'required|string|max:100',
            'detalle'=>'required|string|max:200',
            'activo'=>'required|integer|max:100'
        ]; 

        $mensaje=[
            'required'=>'El :attribute es requerido',
            'clave.required'=>'La clave es requerida'
        ];

        $this->validate($request, $campos, $mensaje);


        //$datosTienda = $request->all(); 
        $datosTipo = $request->except('_token'); 

        if($request->hasFile('foto')) {
            $datosTipo['foto']=$request->file('foto')->store('uploads','public');
        } 

        Tipos::insert($datosTipo); 

        //return response()->json($datosTienda);
        return redirect('tipo')->with('mensaje','Tipo agregada con exito');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Tipos  $tipos
     * @return \Illuminate\Http\Response
     */
    public function show(Tipos $tipos)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Tipos  $tipos
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $tipo=Tipos::findOrfail($id); 
        return view('tipo.edit', compact('tipo') ); 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Tipos  $tipos
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $datosTipo = request()->except(['_token','_method']);
        
        if($request->hasFile('foto')) {

            $tipo=Tipos::findOrfail($id);

            Storage::delete(['public/'.$tipo->foto]);

            $datosTipo['foto']=$request->file('foto')->store('uploads','public');
        } 

        Tipos::where('id','=',$id)->update($datosTipo);  

        $tipo=Tipos::findOrfail($id); 
        //return view('tipo.edit', compact('tipo') ); 

        return redirect('tipo')->with('mensaje','Tipo Modificado');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tipos  $tipos
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $tipo=Tipos::findOrfail($id);

        if(Storage::delete('public/'.$tipo->foto)) {

            Tipos::destroy($id); 

        }

      
        return redirect('tipo')->with('mensaje','Tipo Eliminado');
    }
}
