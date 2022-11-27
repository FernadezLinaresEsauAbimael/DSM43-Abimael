<?php

namespace App\Http\Controllers;

use App\Models\Usuarios;
use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use App\Models\User;
use Spatie\Permission\Models\Role; 
use Illuminate\Support\Facades\DB; 
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Arr;   

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
        $usuarios = User::paginate(2); 
        return view('usuario.index', compact('usuarios')); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $roles = Role::pluck('name', 'name')->all(); 
        return view('usuario.create', compact('roles')); 
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
            //'clave'=>'required|string|max:100',
            'nombre'=>'required|string|max:100',
            //'app'=>'required|string|max:100',
            //'apm'=>'required|string|max:100',
            //'fn'=>'required|date',
            'gen'=>'required|string|max:100',
            //'foto'=>'required|max:1000|mimes:jpeg,png,jpg',
            'email'=>'required|string|max:100',
            'pass'=>'required|string|max:100',
            'Rol'=>'required|integer|max:100',
            //'activo'=>'required|boolean|max:100'
        ]; 

        $mensaje=[
            'required'=>'El :attribute es requerido',
            //'foto.required'=>'La foto es requerida',
            //'clave.required'=>'La clave es requerida',
            //'fn.required'=>'La fecha de nacimiento es requerida'
        ];

        $this->validate($request, $campos, $mensaje);


        //$datosUsuario = $request->all(); 
        $datosUsuario = $request->except('_token'); 

        if($request->hasFile('foto')) {
            $datosUsuario['foto']=$request->file('foto')->store('uploads','public');
        } 

        Usuarios::insert($datosUsuario); 

        //nuevo codigo inicio para roles 
        $input = $request->all(); 
        $input['pass'] = Hash::make($input['password']); 

        $user = User::create($input); 
        $user->assignRole($request->input('roles')); 
        //fin de codigo de roles 

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
        /* Mi codigo anterior 
        $usuario=Usuarios::findOrfail($id); 
        return view('usuario.edit', compact('usuario') );
        */ 

        //Nuevo coigo para roles de usuario 
        $user = User::find($id); 
        $roles = Role::pluck('name', 'name')->all(); 
        $userRole = $user->roles->pluck('name', 'name')->all(); 

        return view('usuario.edit', compact('user', 'roles', 'userRole') );
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

        //Nuevo codigo de roles 
        $input = $request->all(); 
        if (!empty($input['pass'])) {
            $input['pass'] = Hash::make($input['pass']); 
        }else {
            $input= Arr::except($input, array('pass')); 
        }

        $user = User::find($id); 
        $user->update($input); 
        DB::table('model_has_roles')->where('model_id', $id)->delete(); 

        $user->assignRole($request->input('roles')); 
        //Fin del codigo de roles 

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


