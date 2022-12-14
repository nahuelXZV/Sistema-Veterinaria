<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NotaVenta extends Model
{
    use HasFactory;
    protected $fillable = [
        'nombre_cliente',
        'monto_total',
        'otros',
    ];

    public function detalle_nota_ventas()
    {
        return $this->hasMany(DetalleVenta::class);
    }
}
