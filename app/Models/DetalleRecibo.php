<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetalleRecibo extends Model
{
    use HasFactory;
    protected $fillable = [
        'precio',
        'cantidad',
        'recibo_id',
        'producto_id',
    ];

    public function producto()
    {
        return $this->belongsTo(Producto::class);
    }

    public function recibo()
    {
        return $this->belongsTo(Recibo::class);
    }
}
