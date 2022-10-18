<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    use HasFactory;
    protected $fillable = [
        'nombre',
        'direccion',
        'telefono',
        'correo',
        'otros',
    ];

    // relacion con mascotas
    public function mascotas()
    {
        return $this->hasMany(Mascota::class);
    }
}
