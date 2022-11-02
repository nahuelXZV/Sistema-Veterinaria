<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetalleServicio extends Model
{
    use HasFactory;
    protected $fillable = [
        'precio',
        'servicio_id',
        'recibo_id'
    ];

    public function servicio()
    {
        return $this->belongsTo(Servicio::class);
    }

    public function recibo()
    {
        return $this->belongsTo(Recibo::class);
    }
}
