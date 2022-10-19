<?php

namespace App\Http\Livewire\Servicio\Reserva;

use App\Models\Reserva;
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
        $reservas = Reserva::join('clientes', 'clientes.id', '=', 'reservas.cliente_id')
            ->select('reservas.*', 'clientes.nombre as cliente', 'clientes.telefono as telefono')
            ->orWhere('clientes.nombre', 'ILIKE', '%' . strtolower($this->attribute) . '%')
            ->orWhere('reservas.fecha_atencion', 'ILIKE', '%' . strtolower($this->attribute) . '%')
            ->orWhere('reservas.hora_atencion', 'ILIKE', '%' . strtolower($this->attribute) . '%')
            ->orWhere('reservas.estado', 'ILIKE', '%' . strtolower($this->attribute) . '%')
            ->orderBy('reservas.id', 'desc')
            ->paginate(20);
        return view('livewire.servicio.reserva.lw-index', compact('reservas'));
    }
}
