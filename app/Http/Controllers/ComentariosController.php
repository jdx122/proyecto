<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comentario;
use App\Models\usuario;

use Validator;

class ComentariosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Comentario::all();
        $usuarios = usuario::all();

        return view('comentarios.index', compact('data', 'usuarios'));
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
            'descripcion' => 'required|string|max:500',
            'estado' => 'required|in:0,1',
            'valoracion' => 'required|integer|between:1,5',
            'producto_id' => 'required|exists:productos,id',
            'usuario_id' => 'required|exists:usuarios,id',
        ]);

        //dd($request->all());


        // Si falla la validación, redirige con errores y datos antiguos
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }
        //dd($validator->validated()); 

        // Crear comentario
        Comentario::create($validator->validated());

        return redirect('comentario')
            ->with('success', 'Comentario creado correctamente.')
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
        $comentario = Comentario::findOrFail($id);
        $usuarios = usuario::all();

        return view('comentarios.edit', compact('comentario', 'usuarios'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validator = Validator::make($request->all(), [
            'descripcion' => 'required|string|max:500',
            'estado' => 'required|in:0,1',
            'valoracion' => 'required|integer|between:1,5',
            'producto_id' => 'required|exists:productos,id',
            'usuario_id' => 'required|exists:usuarios,id',
        ]);

        // Si falla la validación, redirige con errores y datos antiguos
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        // Actualizar comentario
        $comentario = Comentario::findOrFail($id);
        $comentario->update($validator->validated());

        return redirect('comentario')
            ->with('info', 'Comentario actualizado correctamente.')
            ->with('type', 'info');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $comentario = Comentario::findOrFail($id);

        // Verificar si el comentario existe
        if (!$comentario) {
            return redirect('comentario')
                ->with('error', 'Comentario no encontrado.')
                ->with('type', 'danger');
        }

        // Eliminar comentario
        $comentario->delete();

        return redirect('comentario')
            ->with('success', 'Comentario eliminado correctamente.')
            ->with('type', 'danger');
    }
}
