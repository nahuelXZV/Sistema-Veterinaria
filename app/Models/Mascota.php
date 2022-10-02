<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mascota extends Model
{
    use HasFactory;
    protected $fillable = [
        'nombre',
        'edad',
        'sexo',
        'especie',
        'raza',
        'fecha_nacimiento',
        'otros',
    ];
}
