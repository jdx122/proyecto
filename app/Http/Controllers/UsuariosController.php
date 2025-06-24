<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuario;

use Validator;

class UsuariosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Usuario::all();

        return view('usuarios.index', compact('data'));
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
            'nombre' => 'required|max:255|unique:usuarios',
            'movil' => 'required|numeric',
            'email' => 'required|email|unique:usuarios,email',
            'password' => 'required|',
            'rol' => 'required|in:admin,vendedor',
            'ciudad_id' => 'required|exists:ciudades,id',
        ]);
        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }
        

        $usuario = new usuario();
        
        $usuario->nombre = $request->nombre;
        $usuario->movil = $request->movil;
        $usuario->email = $request->email;
        $usuario->password = bcrypt($request->password);
        $usuario->rol = $request->rol;
        $usuario->ciudad_id = $request->ciudad_id;

        if ($request->hasFile('imagen')) {
            $request->validate([
                'imagen' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            ]);
            $usuario->imagen = $request->file('imagen')->store('usuarios', 'public');
        }

        if ($request->hasFile('imagen')) {
            $file = $request->file('imagen');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('img/usuarios'), $filename);
            $usuario->imagen = $filename;
        } else {
            $usuario->imagen = null; // O un valor por defecto
        }

        $usuario->save();

        return redirect('usuario')
                ->with('success', 'Usuario creado correctamente.')
                ->with('type', 'success');
    }
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $usuario = Usuario::findOrFail($id);
        
        return view('usuarios.show', compact('usuario'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $usuario = Usuario::findOrFail($id);
        
        return view('usuarios.edit', compact('usuario'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validator = Validator::make($request->all(), [
            'nombre' => 'required|max:255|unique:usuarios,nombre,' . $id,
            'movil' => 'required|numeric',
            'email' => 'required|email|unique:usuarios,email,' . $id,
            'password' => 'nullable',
            'rol' => 'required|in:admin,vendedor',
            'ciudad_id' => 'required|exists:ciudades,id',
        ]);
        if ($validator->fails()) {
            dd($validator->errors());
            return back()->withErrors($validator)->withInput();
        }

        $usuario = Usuario::findOrFail($id);
        
        $usuario->nombre = $request->nombre;
        $usuario->movil = $request->movil;
        $usuario->email = $request->email;
        if ($request->filled('password')) {
            $usuario->password = bcrypt($request->password);
        }
        $usuario->rol = $request->rol;
        $usuario->ciudad_id = $request->ciudad_id;

        if ($request->hasFile('imagen')) {
            $file = $request->file('imagen');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('img/usuarios'), $filename);
            $usuario->imagen = $filename;
        } else {
            // No se actualiza la imagen si no se proporciona una nueva
            // O puedes mantener la imagen actual si no se proporciona una nueva
        }

        $usuario->save();

        return redirect('usuario')
                ->with('success', 'Usuario actualizado correctamente.')
                ->with('type', 'info');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $usuario = Usuario::findOrFail($id);

        // Verificar si el usuario tiene pedidos asociados
        if ($usuario->productos()->count() > 0) {
            return redirect('usuario')
                    ->with('error', 'No se puede eliminar el usuario porque tiene productos asociados.')
                    ->with('type', 'warning');
        }

        // Eliminar la imagen si existe
        if ($usuario->imagen && file_exists(public_path('img/usuarios/' . $usuario->imagen))) {
            unlink(public_path('img/usuarios/' . $usuario->imagen));
        }

        $usuario->delete();

        return redirect('usuario')
                ->with('success', 'Usuario eliminado correctamente.')
                ->with('type', 'danger');

                
    }
}
