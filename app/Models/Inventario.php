<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inventario extends Model
{
    use HasFactory;

    protected $table = 'inventario';

    protected $fillable = [
        'id_producto',
        'id_sucursal',
        'numero_estante',
        'cantidad_piezas',
        'cantidad_empaques',
        'piezas_por_empaque',
        'total_piezas',
    ];

    // Relación muchos a uno con Producto
    public function producto()
    {
        return $this->belongsTo(Producto::class, 'id_producto');
    }

    // Relación muchos a uno con Sucursal
    public function sucursal()
    {
        return $this->belongsTo(Sucursal::class, 'id_sucursal');
    }
}
