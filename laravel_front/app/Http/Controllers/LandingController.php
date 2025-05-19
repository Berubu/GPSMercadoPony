<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;

public function index()
{
    // Obtener los 10 primeros productos
    $productos = Producto::limit(10)->get();

    // Pasar los productos a la vista 'landing'
    return view('components.vista-producto', compact('productos'));
}
