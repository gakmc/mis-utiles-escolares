<?php

namespace App\Http\Controllers;

use App\Models\Ciudad;
use Illuminate\Http\Request;

class CiudadController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.complemento.ciudad.index', [
            'ciudades' => Ciudad::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.complemento.ciudad.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validarData = $request->validate([
            'nombre_ciudad' => 'string|required|max:15'
        ],[
            'nombre_ciudad.required' => 'El nombre de la ciudad es obligatorio.',
            'nombre_ciudad.max' => 'El nombre de la ciudad no debe tener más de 15 caracteres.',
        ]);


        Ciudad::create($validarData);


        return redirect()->route('admin.complemento.complemento', ['tab' => 'ciudades']);
    }

    /**
     * Display the specified resource.
     */
    public function show(Ciudad $ciudad)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Ciudad $ciudad)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Ciudad $ciudad)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Ciudad $ciudad)
    {
        //
    }
}
