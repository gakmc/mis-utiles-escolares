<?php

namespace App\Http\Controllers;

use App\Models\Inventario;
use App\Models\Producto;
use App\Models\Sucursal;
use Illuminate\Http\Request;

class InventarioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $inventarios = Inventario::with('producto', 'sucursal')->get();

        return view('admin.inventario.index', compact('inventarios'));
    }
    
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $productos = Producto::all();
        $sucursales = Sucursal::all();

        return view('admin.inventario.create', compact('productos', 'sucursales'));
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validarData = $request->validate([
            'id_producto' => 'required|numeric',
            'id_sucursal' => 'required|numeric',
            'numero_estante' => 'required|numeric|digits:3',
            'cantidad_piezas' => 'required|numeric',
            'cantidad_empaques' => 'required|numeric',
            'piezas_por_empaque' => 'required|numeric',

        ],[
            'id_producto.required' => 'El producto es obligatorio.',
            'id_producto.numeric' => 'El producto debe ser de tipo Numérico.',
            
            'id_sucursal.required' => 'La sucursal es obligatoria.',
            'id_sucursal.numeric' => 'La sucursal debe ser de tipo Numérico.',
            
            'numero_estante.required' => 'El número de estante es obligatorio.',
            'numero_estante.digits' => 'El número de estante debe estar compuesto por 3 dígitos.',
            
            'cantidad_piezas.required' => 'La cantidad de piezas es obligatorio.',
            'cantidad_piezas.numeric' => 'La cantidad de piezas debe ser de tipo Numérico.',
            
            'cantidad_empaques.required' => 'La cantidad de empaques es obligatorio.',
            'cantidad_empaques.numeric' => 'La cantidad de empaques debe ser de tipo Numérico.',
            
            'piezas_por_empaque.required' => 'La cantidad de piezas por empaque es obligatorio.',
            'piezas_por_empaque.numeric' => 'La cantidad de piezas por empaque debe ser de tipo Numérico.',

        ]);
        

        Inventario::create($validarData);
        return view('admin.inventario.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Inventario $inventario)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Inventario $inventario)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Inventario $inventario)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Inventario $inventario)
    {
        //
    }
}
