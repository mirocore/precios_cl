<?php

use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CatalogoController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;

/* ADMIN */

Route::get( '/admin/categorias', [CategoriaController::class, 'index'] )->name('categorias.index');

Route::get( '/admin/categorias/create', [CategoriaController::class, 'create'] )->name('categorias.create');

Route::post( '/admin/categorias', [CategoriaController::class, 'store'] );

Route::delete('/admin/categorias/{categoria}', [CategoriaController::class, 'destroy']);

Route::get('/admin/categorias/edit/{categoria}', [CategoriaController::class, 'edit'])->name('categorias.edit');

Route::put('/admin/categorias/{categoria}', [CategoriaController::class, 'update'])->name('categorias.update');



Route::get( '/admin/productos', [ProductController::class, 'index'] )->name('products.index');

Route::get( '/admin/productos/create', [ProductController::class, 'create'] )->name('products.create');

Route::post( '/admin/productos', [ProductController::class, 'store'] );

Route::get('/admin/productos/edit/{producto}', [ProductController::class, 'edit'])->name('products.edit');

Route::put('/admin/productos/{producto}', [ProductController::class, 'update'])->name('products.update');

Route::delete( '/admin/productos/{producto}', [ProductController::class, 'destroy'] );


Route::get('/login', [AuthController::class, 'login'])->name('login.page');

Route::get('/register', [AuthController::class, 'register'])->name('register.page');

Route::post('/auth/register', [AuthController::class, 'createUser']);


Route::post('/auth/login', [AuthController::class, 'doLogin']);

Route::post('/auth/logout', [AuthController::class, 'logout']);

Route::put('/admin/productos/estado/{producto}', [ProductController::class, 'cambiarEstado']);

/* HOME */

Route::get( '/', [CatalogoController::class, 'index'] );