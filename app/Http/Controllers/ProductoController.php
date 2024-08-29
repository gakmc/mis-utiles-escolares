<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use App\Models\TipoProducto;
use Illuminate\Http\Request;

class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.productos.index',[
            'productos' => Producto::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.productos.create',[
            'tipos' => TipoProducto::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        dd($request);
        $request->validate([
            'codigo_barra' => 'required|numeric',
            'nombre_producto' => 'required|string|max:255',
            'lote_id' => 'required|numeric',
            'tipo_producto_id' => 'required',
            'descripcion' => 'max:255| ',
            'imagen_producto' => 'required|image|mimes:jpeg,png,jpg,gif,jfif,webp|max:2048',
            'codigo_qr' => 'required|image|mimes:jpeg,png,jpg,gif,jfif,webp|max:2048',
        ]);

    }

    /**
     * Display the specified resource.
     */
    public function show(Producto $producto)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Producto $producto)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Producto $producto)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Producto $producto)
    {
        //
    }
}
