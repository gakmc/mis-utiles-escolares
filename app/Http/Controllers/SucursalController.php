<?php

namespace App\Http\Controllers;

use App\Models\Sucursal;
use App\Models\Ciudad;
use Illuminate\Http\Request;

class SucursalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.complemento.sucursal.index', [
            'sucursales' => Sucursal::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.complemento.sucursal.create', [
            'ciudades' => Ciudad::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validarData = $request->validate([
            'nombre_sucursal' => 'required|string|max:50',
            'ciudad_id' => 'required|numeric',
            'direccion' => 'string|nullable|max:150',
        ],[
            'nombre_sucursal.required' => 'El nombre de la sucursal es obligatorio.',
            'nombre_sucursal.max' => 'El nombre de la sucursal no debe tener más de 50 caracteres.',
            'ciudad_id.required' => 'La ciudad de la sucursal es obligatoria.',
            'ciudad_id.numeric' => 'La ciudad debe ser de tipo Numérico.',
            'direccion.max' => 'La direccion no debe tener más de 150 caracteres.',
        ]);
        

        Sucursal::create($validarData);

        return redirect()->route('admin.complemento.complemento', ['tab' => 'sucursales']);
    }

    /**
     * Display the specified resource.
     */
    public function show(Sucursal $sucursal)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Sucursal $sucursal)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Sucursal $sucursal)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Sucursal $sucursal)
    {
        //
    }
}
