<?php

namespace App\Http\Livewire\Servicio\Cliente;

use App\Models\Cliente;
use Livewire\WithPagination;
use Livewire\Component;

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
        $clientes = Cliente::where('nombre', 'ILIKE', '%' . strtolower($this->attribute) . '%')
            ->orWhere('telefono', 'ILIKE', '%' . strtolower($this->attribute) . '%')
            ->orWhere('correo', 'ILIKE', '%' . strtolower($this->attribute) . '%')
            ->orderBy('id', 'desc')
            ->paginate(20);
        return view('livewire.servicio.cliente.lw-index', compact('clientes'));
    }
}
