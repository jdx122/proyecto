<?php


use Illuminate\Support\Facades\Route;

use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\CiudadesController;
use App\Http\Controllers\ProductosController;
use App\Http\Controllers\ComentariosController;
use App\Http\Controllers\UsuariosController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MarketController;
use Illuminate\Support\Facades\Auth;




Route::get('/', function () {
    if (Auth::check())
        return redirect('inicio');
    
    return view('login');
});

Route::get('/login', function () {
    if (Auth::check())
        return redirect('inicio');
    return view('login');
})->name('login');

Route::get('/register', function () {
    return view('register');
});

Route::get('/terminos-condiciones', function () {
    return view('terminos');
});

Route::post('register', [LoginController::class, 'login']);

Route::post('check', [LoginController::class, 'check']);

Route::middleware(['auth'])->group(function () {
    Route::get('/inicio', function () {
        return view('inicio');
    });

    Route::get('logout', [LoginController::class, 'logout'])->name('logout');

    Route::resource('categoria', CategoriaController::class);
    Route::resource('ciudad', CiudadesController::class);
    Route::resource('producto', ProductosController::class);
    Route::resource('comentario', ComentariosController::class);
    Route::resource('usuario', UsuariosController::class);

});


//rutas de marketplace
Route::get('/marketplace', [MarketController::class, 'index'])->name('marketplace.index');

// ruta para filtrar por categoría
Route::get('/productos/categoria/{slug}', [MarketController::class, 'porCategoria'])
    ->name('productos.categoria');



