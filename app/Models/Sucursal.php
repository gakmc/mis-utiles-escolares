<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sucursal extends Model
{
    protected $table = 'sucursales';

    protected $fillable = [
        'nombre_sucursal',
        'ciudad_id',
        'direccion',
    ];

    use HasFactory;

    public function productos()
    {
        return $this->belongsToMany(Producto::class, 'producto_sucursal', 'id_sucursal', 'id_producto')
            ->withPivot('stock')
            ->withTimestamps();
    }

    public function inventarios()
    {
        return $this->hasMany(Inventario::class, 'id_sucursal');
    }

    public function ciudad()
    {
        return $this->belongsTo(Ciudad::class, 'ciudad_id');
    }
}
