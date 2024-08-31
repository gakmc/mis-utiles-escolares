<?php

namespace App\Http\Controllers;

use App\Models\TipoProducto;
use Illuminate\Http\Request;

class TipoProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.complemento.tipoProducto.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validarData = $request->validate([
            'nombre_tipo_producto' => 'required|string|max:20'
        ],[
            'nombre_tipo_producto.required' => 'El nombre del tipo de producto es obligatorio.',
            'nombre_tipo_producto.max' => 'El nombre del tipo de producto no debe tener más de 20 caracteres.',
        ]);


        TipoProducto::create($validarData);


        return redirect()->route('admin.complemento.complemento', ['tab' => 'tipos']);
    }

    /**
     * Display the specified resource.
     */
    public function show(TipoProducto $tipoProducto)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(TipoProducto $tipoProducto)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, TipoProducto $tipoProducto)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TipoProducto $tipoProducto)
    {
        //
    }
}
