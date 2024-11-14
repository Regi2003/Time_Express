<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PedidoController;
use App\Http\Controllers\ProductoController;

Route::get('/', function () {
    return view('welcome');
});


//USUARIOS
Route::get('/usuario/crear', [UserController::class, 'create'])->name('user.create');
Route::post('/usuario/creado', [UserController::class, 'store'])->name('user.store');
Route::get('/usuario/lista', [UserController::class, 'index'])->name('user.list');
Route::get('/usuario/update/{id}', [UserController::class, 'edit'])->name('user.update');
Route::put('/usuario/update/{id}', [UserController::class, 'update'])->name('user.update.data');
Route::delete('/usuario/delete/{id}', [UserController::class, 'destroy'])->name('user.destroy');

//PEDIDOS
Route::get('/pedido/crear', [PedidoController::class, 'create'])->name('pedido.create');
Route::post('/pedido/creado', [PedidoController::class, 'store'])->name('pedido.store');
Route::get('/pedido/lista', [PedidoController::class, 'index'])->name('pedido.list');
Route::get('/pedido/update/{id}', [PedidoController::class, 'edit'])->name('pedido.update');
Route::put('/pedido/update/{id}', [PedidoController::class, 'update'])->name('pedido.update.data');
Route::delete('/pedido/delete/{id}', [PedidoController::class, 'destroy'])->name('pedido.destroy');


//PRODUCTO

Route::get('/producto/crear', [ProductoController::class, 'create'])->name('producto.create');
Route::post('/producto/creado', [ProductoController::class, 'store'])->name('producto.store');
Route::get('/producto/lista', [ProductoController::class, 'index'])->name('producto.list');
Route::get('/producto/update/{id}', [ProductoController::class, 'edit'])->name('producto.update');
Route::put('/producto/update/{id}', [ProductoController::class, 'update'])->name('producto.update.data');
Route::delete('/producto/delete/{id}', [ProductoController::class, 'destroy'])->name('producto.destroy');