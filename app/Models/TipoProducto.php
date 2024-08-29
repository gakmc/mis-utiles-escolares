<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoProducto extends Model
{
    protected $table = 'tipos_productos';

    protected $fillable = [
        'nombre_tipo_producto',
    ];

    use HasFactory;

    public function productos()
    {
        return $this->hasMany(Producto::class, 'tipo_producto_id');
    }
}
