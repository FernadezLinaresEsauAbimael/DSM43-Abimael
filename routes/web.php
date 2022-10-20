<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\UsuariosController; 
use App\Http\Controllers\ProductosController; 
use App\Http\Controllers\TiendasController; 
use App\Http\Controllers\TiposController; 

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
    return view('auth.login');
});

/*Route::get('/producto', function () {
    return view('producto.index');
}); */

Route::resource('producto', ProductosController::class);

Route::resource('tienda',TiendasController::class); 

Route::resource('tipo',TiposController::class); 

/*
Route::get('/usuario/create',[UsuariosController::class,'create']);
*/

Route::resource('usuario',UsuariosController::class)->middleware('auth'); //Autenticar (seguridad)
Auth::routes(['register'=>False,'reset'=>False]); //Eliminar el enlaze de registrarse y el de recordar password


Route::get('/home', [UsuariosController::class, 'index'])->name('home');


Route::prefix(['middleware'=>'auth'], function () {
    
    Route::get('/', [UsuariosController::class, 'index'])->name('home');

});