<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ciudad extends Model
{
    protected $table = 'ciudades';
    protected $primaryKey = 'id_ciudad';

    protected $fillable = [
        'nombre_ciudad'
    ];

    use HasFactory;

    public function sucursales()
    {
        return $this->hasMany(Sucursal::class, 'ciudad_id');
    }
}
