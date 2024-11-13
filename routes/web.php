<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PedidoController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Middleware\isAuthenticated;
use App\Http\Middleware\AdminMiddleware;

Route::get('/', function () {
    return view('welcome');

});

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);  

Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']); 
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::middleware([isAuthenticated::class])->group(function() {
    Route::get('/productos', [ProductoController::class, 'index'])->name('productos.index');
    Route::get('/productos/{id}', [ProductoController::class, 'show'])->name('productos.show'); 

    Route::get('/usuarios', [UserController::class, 'index'])->name('usuarios.index');
    Route::get('/usuarios/{id}', [UserController::class, 'show'])->name('usuarios.show'); 

    Route::get('/pedidos', [PedidoController::class, 'index'])->name('pedidos.index');
    Route::get('/pedidos/{id}', [PedidoController::class, 'show'])->name('pedidos.show');
});



    Route::middleware([AdminMiddleware::class])->group(function() {
        
Route::get('productos.create', [ProductoController::class, 'create'])->name('productos.create');
Route::post('productos', [ProductoController::class, 'store'])->name('productos.store');
Route::get('productos/{producto}/edit', [ProductoController::class, 'edit'])->name('productos.edit');
Route::put('productos/{producto}', [ProductoController::class, 'update'])->name('productos.update');
Route::delete('productos/{producto}', [ProductoController::class, 'destroy'])->name('productos.destroy');

Route::get('usuarios.create', [UserController::class, 'create'])->name('usuarios.create');
Route::post('usuarios', [UserController::class, 'store'])->name('usuarios.store');
Route::get('/usuarios/{usuario}/edit', [UserController::class, 'edit'])->name('usuarios.edit');
Route::put('/usuarios/{usuario}', [UserController::class, 'update'])->name('usuarios.update');
Route::delete('/usuarios/{usuario}', [UserController::class, 'destroy'])->name('usuarios.destroy');

Route::get('create', [PedidoController::class, 'create'])->name('pedidos.create');
Route::post('pedidos', [PedidoController::class, 'store'])->name('pedidos.store');
Route::get('pedidos/{pedido}/edit', [PedidoController::class, 'edit'])->name('pedidos.edit');
Route::put('pedidos/{pedido}', [PedidoController::class, 'update'])->name('pedidos.update');
Route::delete('pedidos/{pedido}', [PedidoController::class, 'destroy'])->name('pedidos.destroy');
});
