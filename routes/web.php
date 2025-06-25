<?php


use Illuminate\Support\Facades\Route;

use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\CiudadesController;
use App\Http\Controllers\ProductosController;
use App\Http\Controllers\ComentariosController;
use App\Http\Controllers\UsuariosController;
use App\Http\Controllers\LoginController;
use App\Models\Categoria;
use Illuminate\Http\Ciudad;
use Illuminate\Http\Producto;
use Illuminate\Http\Comentarios;
use Illuminate\Http\Usuario;




Route::get('/', function () {
    return view('login');
});

Route::get('/login', function () {
    return view('login');
});

Route::get('/register', function () {
    return view('register');
});

Route::get('/terminos-condiciones', function () {
    return view('terminos');
});


Route::post('register', [LoginController::class, 'login']);
Route::post('check', [LoginController::class, 'check']);


Route::resource('categoria', CategoriaController::class);
Route::resource('ciudad', CiudadesController::class);
Route::resource('producto', ProductosController::class);
Route::resource('comentario', ComentariosController::class);
Route::resource('usuario', UsuariosController::class);




