<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ciudad;
use Illuminate\Database\QueryException;

use Validator;

class CiudadesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Ciudad::all();

        return view('ciudades.index', compact('data'));
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
        $ciudad = new Ciudad();

        $ciudad->nombre = $request->nombre;
        $ciudad->estado = $request->estado;
        //dd($request->all());




        $ciudad->save();

        return redirect('ciudad')
            ->with('success', 'Ciudad creada correctamente.')
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
        $ciudad = Ciudad::findOrFail($id);

        return view('ciudades.edit', compact('ciudad'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validator = Validator::make($request->all(), [
            'nombre' => 'required|max:255|unique:ciudades,nombre,' . $id,
            'estado' => 'required|boolean',


        ]);
        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }
        $ciudad = Ciudad::findOrFail($id);

        $ciudad->nombre = $request->nombre;
        $ciudad->estado = $request->estado;

        $ciudad->save();

        return redirect('ciudad')
            ->with('success', 'Ciudad actualizada correctamente.')
            ->with('type', 'info');
    }

    /**
     * Remove the specified resource from storage.
     */

    public function destroy($id)
    {
        try {
            $ciudad = Ciudad::findOrFail($id);

            $ciudad->delete();

            return redirect('ciudad')
                ->with('success', 'Ciudad eliminada correctamente.')
                ->with('type', 'danger');
        } catch (QueryException $e) {
            // Error por clave foránea
            return redirect('ciudad')
                ->with('error', 'No se puede eliminar la ciudad porque está asociada a productos.')
                ->with('type', 'warning');
        }
    }
}
