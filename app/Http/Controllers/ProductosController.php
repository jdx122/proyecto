<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\producto;
use App\Models\categoria;
use App\Models\ciudad;
use App\Models\usuario;


use Validator;

class ProductosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Producto::all();
        $categorias = categoria::all();
        $ciudades = ciudad::all();
        $usuarios = usuario::all();

        return view('productos.index', compact('data', 'categorias', 'ciudades', 'usuarios'));
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
            'estado_producto' => 'required|in:nuevo,poco uso,usado',
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
            ->with('success', 'producto creado correctamente.')
            ->with('type', 'success');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = Producto::all();
        $producto = Producto::findOrFail($id);
        $categorias = Categoria::all();
        $ciudades = Ciudad::all();
        $usuarios = Usuario::all();

        return view('productos.show', compact('data','producto', 'categorias', 'ciudades', 'usuarios'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $producto = Producto::findOrFail($id);
        $categorias = categoria::all();
        $ciudades = ciudad::all();
        $usuarios = usuario::all();

        return view('productos.edit', compact('producto', 'categorias', 'ciudades', 'usuarios'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validator = Validator::make($request->all(), [
            'nombre' => 'required|max:255|unique:productos,nombre,' . $id,
            'slug' => 'required|unique:productos,slug,' . $id,
            'descripcion' => 'nullable|max:255',
            'valor' => 'required|numeric|min:0',
            'imagen' => 'nullable|image',
            'estado_producto' => 'required|in:nuevo,poco uso,usado',
            'categoria_id' => 'required|exists:categorias,id',
            'usuario_id' => 'required|exists:usuarios,id',
            'ciudad_id' => 'required|exists:ciudades,id',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        $producto = Producto::findOrFail($id);

        $producto->nombre = $request->nombre;
        $producto->slug = $request->slug;
        $producto->descripcion = $request->descripcion;
        $producto->valor = $request->valor;

        if ($request->hasFile('imagen')) {
            $file = $request->file('imagen');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('img/productos'), $filename);
            $producto->imagen = $filename;
        }

        $producto->estado_producto = $request->estado_producto;
        $producto->categoria_id = $request->categoria_id;
        $producto->usuario_id = $request->usuario_id;
        $producto->ciudad_id = $request->ciudad_id;

        $producto->save();

        return redirect('producto')
            ->with('success', 'Producto actualizado correctamente.')
            ->with('type', 'info');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $producto = Producto::findOrFail($id);

        // Verificamos si tiene relaciones asociadas antes de borrar
        if ($producto->comentarios()->count() > 0) {
            return redirect('producto')
                ->with('error', 'No se puede eliminar el producto porque tiene comentarios asociados.')
                ->with('type', 'warning');
        }

        // Si no tiene relaciones asociadas, se elimina
        $producto->delete();

        return redirect('producto')
            ->with('success', 'Producto eliminado correctamente.')
            ->with('type', 'danger');
    }
    /**
     * Search for products by name.
     */
    public function search(Request $request)
    {
        $query = $request->input('query');
        $data = Producto::where('nombre', 'LIKE', '%' . $query . '%')->get();
        $categorias = categoria::all();
        $ciudades = ciudad::all();
        $usuarios = usuario::all();

        return view('productos.index', compact('data', 'categorias', 'ciudades', 'usuarios'));
    }
}
