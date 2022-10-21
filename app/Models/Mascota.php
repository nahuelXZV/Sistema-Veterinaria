<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mascota extends Model
{
    use HasFactory;
    protected $fillable = [
        'nombre',
        'sexo',
        'especie',
        'raza',
        'fecha_nacimiento',
        'otros',
        'cliente_id',
    ];

    public function cliente()
    {
        return $this->belongsTo(Cliente::class);
    }

    public function atenciones()
    {
        return $this->hasMany(Atencion::class);
    }

    // vacunas
    public function vacunas()
    {
        return $this->belongsToMany(Vacuna::class, 'mascota_vacuna');
    }
}
