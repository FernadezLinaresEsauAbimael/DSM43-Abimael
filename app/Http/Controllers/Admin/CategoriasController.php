<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CategoriasController extends Controller
{
    //
    public function __construct() {
        $this->middelware('auth'); 
    }

    public function index() {
        return view('admin.categorias.index'); 
    }
}
