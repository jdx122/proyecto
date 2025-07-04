<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Categoria;
use App\Models\Producto;
use App\Models\Ciudad;




class MarketController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categorias = Categoria::where('estado', 1)
            ->with('productos')
            ->has('productos')
            ->orderBy('nombre', 'asc')
            ->get();

        $ciudades = Ciudad::all();

        return view('marketplace.index', compact('categorias', 'ciudades'));
    }


    public function porCategoria($slug)
    {
        $categoria = Categoria::where('slug', $slug)->firstOrFail();
        $productos = Producto::where('categoria_id', $categoria->id)->get();
        $categorias = Categoria::all();
        $ciudades = Ciudad::all();
        

        return view('marketplace.show', [
            'categoria' => $categoria,
            'productos' => $productos,
            'categorias' => $categorias,
            'ciudades' => $ciudades
        ]);
    }
}
