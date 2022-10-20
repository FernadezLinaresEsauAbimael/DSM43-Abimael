<?php

namespace App\Http\Controllers;

use App\Models\Usuarios;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Storage;

class UsuariosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $datos['usuarios']=Usuarios::paginate(20); 
        return view('usuario.index',$datos ); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('usuario.create'); 
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
            'app'=>'required|string|max:100',
            'apm'=>'required|string|max:100',
            'fn'=>'required|date',
            'gen'=>'required|string|max:100',
            'foto'=>'required|max:10000|mimes:jpeg,png,jpg',
            'email'=>'required|string|max:100',
            'pass'=>'required|string|max:100',
            'nivel'=>'required|integer|max:100',
            'activo'=>'required|boolean|max:100'
        ]; 

        $mensaje=[
            'required'=>'El :attribute es requerido',
            'foto.required'=>'La foto es requerida',
            'clave.required'=>'La clave es requerida',
            'fn.required'=>'La fecha de nacimiento es requerida'
        ];

        $this->validate($request, $campos, $mensaje);


        //$datosUsuario = $request->all(); 
        $datosUsuario = $request->except('_token'); 

        if($request->hasFile('foto')) {
            $datosUsuario['foto']=$request->file('foto')->store('uploads','public');
        } 

        Usuarios::insert($datosUsuario); 

        //return response()->json($datosUsuario);
        return redirect('usuario')->with('mensaje','Usuario agregado con exito');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Usuarios  $usuarios
     * @return \Illuminate\Http\Response
     */
    public function show(Usuarios $usuarios)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Usuarios  $usuarios
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $usuario=Usuarios::findOrfail($id); 
        return view('usuario.edit', compact('usuario') ); 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Usuarios  $usuarios
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $datosUsuario = request()->except(['_token','_method']);
        
        if($request->hasFile('foto')) {

            $usuario=Usuarios::findOrfail($id);

            Storage::delete(['public/'.$usuario->foto]);

            $datosUsuario['foto']=$request->file('foto')->store('uploads','public');
        } 

        Usuarios::where('id','=',$id)->update($datosUsuario);  

        $usuario=Usuarios::findOrfail($id); 
        //return view('usuario.edit', compact('usuario') ); 

        return redirect('usuario')->with('mensaje','Usuario Modificado');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Usuarios  $usuarios
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //

        $usuario=Usuarios::findOrfail($id);

        if(Storage::delete('public/'.$usuario->foto)) {

            Usuarios::destroy($id); 

        }

      
        return redirect('usuario')->with('mensaje','Usuario Eliminado');
    }
}
