<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use App\Models\TipoProducto;
use Illuminate\Support\Facades\Storage;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Illuminate\Http\Request;

use Endroid\QrCode\Builder\Builder;
use Endroid\QrCode\Encoding\Encoding;
use Endroid\QrCode\ErrorCorrectionLevel;
use Endroid\QrCode\Writer\PngWriter;

class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.productos.index', [
            'productos' => Producto::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.productos.create', [
            'tipos' => TipoProducto::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request->validate([
            'codigo_barra' => 'required|numeric',
            'nombre_producto' => 'required|string|max:255',
            'lote_id' => 'required|numeric',
            'tipo_producto_id' => 'required',
            'descripcion' => 'max:255|nullable|string',
            'imagen_producto' => 'required|image|mimes:jpeg,png,jpg,gif,jfif,webp|max:2048',
        ], [
            'codigo_barra.required' => 'El código de barras es obligatorio.',
            'codigo_barra.numeric' => 'El código de barras debe ser de tipo numérico.',
            'nombre_producto.required' => 'El nombre del producto es obligatorio.',
            'nombre_producto.max' => 'El nombre del producto no puede tener más de 255 caracteres.',
            'lote_id.required' => 'El N.° de lote es obligatorio.',
            'lote_id.numeric' => 'El N.° de lote debe ser de tipo numérico.',
            'tipo_producto_id.required' => 'El tipo de producto es obligatorio.',
            'descripcion.max' => 'La descripción no puede tener más de 255 caracteres.',
            'imagen_producto.required' => 'La imagen del producto es obligatoria.',
            'imagen_producto.image' => 'El archivo debe ser una imagen.',
            'imagen_producto.mimes' => 'La imagen del producto debe ser un archivo de tipo: jpeg, png, jpg, gif, jfif, webp.',
            'imagen_producto.max' => 'La imagen del producto no debe exceder los 2MB.'
        ]);

        if ($request->hasFile('imagen_producto')) {
            $imgProducto = $request->file('imagen_producto');
            $originalNameProductos = now()->format('Ymd_His').'_'.$imgProducto->getClientOriginalName();
            $rutaProducto = $imgProducto->storeAs('/',$originalNameProductos, 'productos');
        }

        $urlImagen = Storage::disk('productos')->url($rutaProducto);

        $qrContent = "Nombre: " . $request->input('nombre_producto') . "\n" .
        "Código de barra: " . $request->input('codigo_barra') . "\n" .
        "Lote: " . $request->input('lote_id') . "\n" .
        "Tipo de producto: " . $request->input('tipo_producto_id') . "\n" .
        "Descripción: " . $request->input('descripcion') . "\n" .
        "Imagen: " . $urlImagen;

        // $nombreQr = now()->format('Ymd_His').'_'.$request->input('nombre_producto').'_qr.png';
        // $rutaQr = 'img/qr/' . $nombreQr;
        // QrCode::format('png')
        //       ->size(200)
        //       ->generate($qrContent, public_path($rutaQr), 'gd');

        try {
            $result = Builder::create()
                ->writer(new PngWriter())
                ->data($qrContent)
                ->encoding(new Encoding('UTF-8'))
                ->size(200)
                ->margin(10)
                ->build();
    
            // Guardar la imagen QR usando el disco 'qr'
            $qrFileName = now()->format('Ymd_His').'_'.$request->input('nombre_producto') . '_qr.png';
            Storage::disk('qr')->put($qrFileName, $result->getString());
    
            // Guardar la ruta en la base de datos
            $producto = new Producto();
            $producto->nombre_producto = $request->input('nombre_producto');
            $producto->imagen_producto = $rutaProducto;
            $producto->codigo_qr = $qrFileName;
            $producto->codigo_barra = $request->input('codigo_barra');
            $producto->lote_id = $request->input('lote_id');
            $producto->tipo_producto_id = $request->input('tipo_producto_id');
            $producto->descripcion = $request->input('descripcion');
            $producto->save();
    
            return redirect()->route('admin.producto.index')
                ->with('success', 'Producto creado y QR generado exitosamente');
    
        } catch (\Exception $e) {
            return back()->withErrors(['qr' => 'Error al generar el código QR: ' . $e->getMessage()]);
        }
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
