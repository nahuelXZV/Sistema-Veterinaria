<?php

namespace App\Http\Livewire\Servicio\Atencion;

use App\Models\Atencion;
use Livewire\Component;
use Livewire\WithPagination;

class LwIndex extends Component
{
    use WithPagination;
    public $attribute = '';

    //Metodo de reinicio de buscador
    public function updatingAttribute()
    {
        $this->resetPage();
    }

    public function render()
    {
        $atenciones = Atencion::join('clientes', 'clientes.id', '=', 'atencions.cliente_id')
            ->join('mascotas', 'mascotas.id', '=', 'atencions.mascota_id')
            ->select('atencions.*', 'clientes.nombre as cliente', 'mascotas.nombre as mascota')
            ->where('clientes.nombre', 'ILIKE', '%' . strtolower($this->attribute) . '%')
            ->orWhere('mascotas.nombre', 'ILIKE', '%' . strtolower($this->attribute) . '%')
            ->orWhere('atencions.created_at', 'ILIKE', '%' . strtolower($this->attribute) . '%')
            ->orderBy('atencions.id', 'desc')
            ->paginate(20);
        return view('livewire.servicio.atencion.lw-index', compact('atenciones'));
    }
}
