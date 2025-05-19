<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\FacturaController;
use App\Http\Controllers\CompraController;
use App\Http\Controllers\AuthController;


Route::resource('compras', CompraController::class);
Route::get('/compras', [CompraController::class, 'index']);

Route::apiResource('productos', ProductoController::class);
Route::get('/productos', [ProductoController::class, 'index']);
// routes/api.php
Route::get('/productos/{id}', 'ProductoController@showJson');


Route::apiResource('usuarios', UsuarioController::class);
Route::get('/usuarios', [UsuarioController::class, 'index']);

Route::apiResource('facturas', FacturaController::class);
Route::get('facturas/generar/{identificador}', [FacturaController::class, 'generarFactura']);

Route::apiResource('usuarios', UsuarioController::class);
Route::post('/usuarios', [UsuarioController::class, 'store']);

Route::post('/login', [AuthController::class, 'login'])->withoutMiddleware('auth:sanctum');




Route::get('/buscar', [ProductoController::class, 'search']);



Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

