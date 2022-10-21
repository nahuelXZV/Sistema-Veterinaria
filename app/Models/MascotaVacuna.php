<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MascotaVacuna extends Model
{
    use HasFactory;
    protected $fillable = [
        'mascota_id',
        'vacuna_id',
        'fecha',
        'observacion',
    ];

    public function mascota()
    {
        return $this->belongsTo(Mascota::class);
    }

    public function vacuna()
    {
        return $this->belongsTo(Vacuna::class);
    }
}
