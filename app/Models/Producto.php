<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_producto';

    protected $fillable = [
        'codigo_barra',
        'codigo_qr',
        'nombre_producto',
        'imagen_producto',
        'lote_id',
        'tipo_producto_id',
        'descripcion',
    ];

    public function tipoProducto()
    {
        return $this->belongsTo(TipoProducto::class, 'tipo_producto_id');
    }

    public function sucursales()
    {
        return $this->belongsToMany(Sucursal::class, 'producto_sucursal', 'id_producto', 'id_sucursal')
            ->withPivot('stock')
            ->withTimestamps();
    }

    public function inventarios()
    {
        return $this->hasMany(Inventario::class, 'id_producto');
    }
}
