<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\CompraController;
use Illuminate\Support\Facades\Auth;





Route::get('/productos', [ProductoController::class, 'index']);
Route::get('/usuarios', [UsuarioController::class, 'index']);

Route::get('/productos/{id}', [ProductoController::class, 'showHtml'])->name('components.vista-producto-react');//components.vista-producto


Route::get('/vista-fact', function () {
});


// En routes/web.php
Route::get('/vista-compra/{id}', [ProductoController::class, 'show2'])->name('components.vista-compra');


Route::get('/perfil', function () {
    return view('components.cuenta-usuario');
})->name('components.cuenta-usuario');



Route::get('/', [ProductoController::class, 'landing'])->name('landing');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::delete('/producto/{id}', [ProductoController::class, 'destroy'])->name('producto.destroy');


Route::get('/login', [UsuarioController::class, 'showLoginForm'])->name('components.loginForm');
Route::post('/login', [UsuarioController::class, 'login'])->name('components.login');


Route::post('/logout', function () {
    Auth::logout();
    return redirect('/');
})->name('logout');

Route::get('/crear', function () {
    return view('components.crear');
})->name('components.crear');

Route::get('/header', function () {
    return view('components.header');
})->name('components.header');

Route::get('/landing', function () {
    return view('components.landing');
})->name('components.landing');

Route::get('/vista', function () {
    return view('components.vista-producto');
})->name('components.vista-producto');

Route::get('/footer', function () {
    return view('components.footer');
})->name('components.footer');

Route::get('/cuenta', function () {
    return view('components.cuenta');
})->name('components.cuenta');

Route::get('/vista-compra', function () {
    return view('components.vista-compra');
})->name('components.vista-compra');

Route::get('/factura', function () {
    return view('components.factura');
})->name('components.factura');

Route::resource('compras', CompraController::class);
Route::get('compras/{id}/invoice', [CompraController::class, 'generateInvoice'])->name('compras.invoice');
Route::get('/compras/{id}/xml', [CompraController::class, 'generateXML'])->name('compras.xml');
Route::get('/buscar', [ProductoController::class, 'buscar'])->name('buscar');




// Ruta para mostrar el formulario de registro
Route::get('/register', [UsuarioController::class, 'showRegisterForm'])->name('registerForm');

// Ruta para procesar el formulario de registro
Route::post('/register', [UsuarioController::class, 'register'])->name('register');

Route::get('/lista-productos', function () {
    return view('components.listaprod');
})->name('components.listaprod');

Route::get('/lista-productos', [ProductoController::class, 'listaprod'])->name('listaprod');

Route::post('/producto', [ProductoController::class, 'store'])->name('producto.store');



