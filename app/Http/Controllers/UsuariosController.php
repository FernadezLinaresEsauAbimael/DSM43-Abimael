<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use App\Models\User;
use Spatie\Permission\Models\Role; 
use Illuminate\Support\Facades\DB; 
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Arr;   



class UsuariosController extends Controller
{

    function __construct() 
    {
        $this->middleware('permission:ver-usuarios|crear-usuarios|editar-usuarios|borrar-usuarios')->only('index');
        $this->middleware('permission:crear-usuarios', ['only'=>['create','store']]);
        $this->middleware('permission:editar-usuarios', ['only'=>['edit','update']]);
        $this->middleware('permission:borrar-usuarios', ['only'=>['destroy']]);
    }




    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        $usuarios = User::paginate(5); 
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

        $this->validate($request, [
            'name'=>'required',
            //'imagen'=>'required|mimes:jpeg,png,jpg,svg|max:2048',
            'email'=>'required|email|unique:users,email',
            'password'=>'required|same:confirm-password',
            'roles'=>'required|'
        ]); 

        //nuevo codigo inicio para roles 
        $input = $request->all(); 
        $input['password'] = Hash::make($input['password']); 

        $user = User::create($input); 
        $user->assignRole($request->input('roles')); 
        //fin de codigo de roles 


        //return response()->json($datosUsuario);
        return redirect()->route('usuario.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Usuarios  $usuarios
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $user = User::find($id);
        //dd($user); 
        return view('usuario.show', compact('user'));
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

        return view('usuario.edit', compact('user', 'roles', 'userRole'));
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

        $this->validate($request, [
            'name'=>'required',
            'email'=>'required|email|unique:users,email,'.$id,
            'password'=>'same:confirm-password',
            'roles'=>'required'
        ]);

        //Nuevo codigo de roles 
        $input = $request->all(); 
        if (!empty($input['password'])) {
            $input['password'] = Hash::make($input['password']); 
        }else {
            $input= Arr::except($input, array('password')); 
        }

        $user = User::find($id); 
        $user->update($input); 
        DB::table('model_has_roles')->where('model_id', $id)->delete(); 

        $user->assignRole($request->input('roles')); 
        //Fin del codigo de roles 

        return redirect()->route('usuario.index');
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
        User::find($id)->delete(); 

        return redirect()->route('usuario.index');
    }
}


