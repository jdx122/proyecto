<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\producto;

class ProductosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Producto::all();

        return view('productos.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nombre' => 'required|max:255|unique:productos',
            'slug' => 'required|unique:productos,slug',
            'descripcion' => 'nullable|max:255',
            'valor' => 'required|numeric|min:0',
            'imagen' => 'nullable|image',
            'estado_producto' => 'required|boolean',
            'categoria_id' => 'required|exists:categorias,id',
            'usuario_id' => 'required|exists:usuarios,id',
            'ciudad_id' => 'required|exists:ciudades,id',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        $producto = new producto();
        
        $producto->nombre = $request->nombre;
        $producto->slug = $request->slug;
        $producto->descripcion = $request->descripcion;
        $producto->valor = $request->valor;
        
        if ($request->hasFile('imagen')) {
            $request->validate([
                'imagen' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            ]);
            $producto->imagen = $request->file('imagen')->store('productos', 'public');
        }
       
        $producto->estado_producto = $request->estado_producto;
        $producto->categoria_id = $request->categoria_id;
        $producto->usuario_id = $request->usuario_id;
        $producto->ciudad_id = $request->ciudad_id;

        if ($request->hasFile('imagen')) {
            $file = $request->file('imagen');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('img/productos'), $filename);
            $producto->imagen = $filename;
        } else {
            $producto->imagen = null; // O un valor por defecto
        }

        $producto->save();

        return redirect('producto')
                ->with('success', 'producto creada correctamente.')
                ->with('type', 'success');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
