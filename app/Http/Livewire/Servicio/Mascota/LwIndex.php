<?php

namespace App\Http\Livewire\Servicio\Mascota;

use App\Models\Mascota;
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
        $mascotas = Mascota::join('clientes', 'clientes.id', '=', 'mascotas.cliente_id')
            ->select('mascotas.*', 'clientes.nombre as cliente')
            ->where('clientes.nombre', 'ILIKE', '%' . strtolower($this->attribute) . '%')
            ->orWhere('mascotas.nombre', 'ILIKE', '%' . strtolower($this->attribute) . '%')
            ->orWhere('mascotas.raza', 'ILIKE', '%' . strtolower($this->attribute) . '%')
            ->orWhere('mascotas.especie', 'ILIKE', '%' . strtolower($this->attribute) . '%')
            ->orderBy('mascotas.id', 'desc')
            ->paginate(20);
        return view('livewire.servicio.mascota.lw-index', compact('mascotas'));
    }
}
