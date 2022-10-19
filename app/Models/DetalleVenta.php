<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetalleVenta extends Model
{
    use HasFactory;
    protected $fillable = [
        'cantidad',
        'precio',
        'nota_venta_id',
        'producto_id',
    ];

    public function nota_venta()
    {
        return $this->belongsTo(NotaVenta::class);
    }

    public function producto()
    {
        return $this->belongsTo(Producto::class);
    }
}
