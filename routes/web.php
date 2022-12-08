<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\UsuariosController; 
use App\Http\Controllers\ProductosController; 
use App\Http\Controllers\TiendasController;  

use App\Http\Controllers\HomeController; 
use App\Http\Controllers\RolController; 

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/', function () {
    return view('welcome');
});

/*Route::get('/producto', function () {
    return view('producto.index');
}); */

/*
Route::resource('producto', ProductosController::class);

Route::resource('tienda',TiendasController::class); 

Route::resource('tipo',TiposController::class); 
*/

/*
Route::get('/usuario/create',[UsuariosController::class,'create']);
*/

//Route::resource('usuario',UsuariosController::class)->middleware('auth'); //Autenticar (seguridad)
//Auth::routes(['register'=>true,'reset'=>true]); //Eliminar el enlaze de registrarse y el de recordar password



//Route::get('/home', [UsuariosController::class, 'index'])->name('home');


/*Route::prefix(['middleware'=>'auth'], function () {
    
    Route::get('/', [UsuariosController::class, 'index'])->name('home');
    Route::resource('Roles', RolController::class); 

}); 
*/

//Route::get('/admin/categorias', 'Admin\CategoriasController@index')->name('admin.categorias');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home'); 

Route::get('/usuario/(user)', [App\Http\Controllers\HomeController::class, 'show'])->name('usuario.show'); 


//Nuevo codgio del proyecto 
Route::group(['middlware' => ['auth']], function(){
    Route::resource('roles', RolController::class);
    Route::resource('usuario', UsuariosController::class);
    Route::resource('producto', ProductosController::class);

    Route::resource('tienda', TiendasController::class);
}); 


//Para mandarlos a otro lado 
Route::get('/user', [HomeController::class, 'getUser']);  