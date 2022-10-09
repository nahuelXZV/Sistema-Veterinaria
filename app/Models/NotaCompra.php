<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NotaCompra extends Model
{
    use HasFactory;
    protected $fillable = [
        'monto_total',
        'otros',
        'proveedor_id',
    ];

    public function detalle_nota_compras()
    {
        return $this->hasMany(DetalleCompra::class);
    }

    public function proveedor()
    {
        return $this->belongsTo(Proveedor::class);
    }
}
