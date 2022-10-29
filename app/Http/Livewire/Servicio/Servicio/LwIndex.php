<?php

namespace App\Http\Livewire\Servicio\Servicio;

use App\Models\Servicio;
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
        $servicios = Servicio::where('nombre', 'ILIKE', '%' . strtolower($this->attribute) . '%')
            ->orWhere('precio', 'ILIKE', '%' . strtolower($this->attribute) . '%')
            ->orWhere('descripcion', 'ILIKE', '%' . strtolower($this->attribute) . '%')
            ->orderBy('id', 'desc')
            ->paginate(20);
        return view('livewire.servicio.servicio.lw-index', compact('servicios'));
    }
}
