<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Categoria;
use Illuminate\Http\Request;

class CategoriaController extends Controller
{
    public function index(){
        $categorias = Categoria::all();
        return view('admin.categoria.index')->with('categorias',$categorias);
    }
    
    public function create(){
        return view('admin.categoria.create');
    }
}
