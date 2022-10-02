<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bitacora extends Model
{
    use HasFactory;
    protected $fillable = [
        'accion',
        'tabla',
        'ip',
        'id_registro',
        'user_id',
    ];

    static public function Bitacora($evento, $tabla, $id_registro)
    {
        $event = '';
        $bitacora = new Bitacora();
        switch ($evento) {
            case 'C':
                $event = 'Crear';
                break;
            case 'U':
                $event = 'Actualizar';
                break;
            case 'D':
                $event = 'Eliminar';
                break;
            case 'R':
                $event = 'Descargó';
                break;
            case 'I':
                $event = 'Inició sesión';
                break;
            case 'L':
                $event = 'Cerró Sesión';
                break;
            default:
                $event = 'Sin definir';
                break;
        }
        $bitacora->accion = $event;
        $bitacora->tabla = $tabla;
        $bitacora->id_registro = $id_registro;
        $bitacora->ip = request()->ip();
        $bitacora->user_id = auth()->user()->id;
        $bitacora->save();
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
