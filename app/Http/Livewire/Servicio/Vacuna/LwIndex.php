<?php

namespace App\Http\Livewire\Servicio\Vacuna;

use App\Models\Vacuna;
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
        $vacunas = Vacuna::where('nombre', 'ILIKE', '%' . strtolower($this->attribute) . '%')
            ->orWhere('descripcion', 'ILIKE', '%' . strtolower($this->attribute) . '%')
            ->orderBy('id', 'desc')
            ->paginate(20);
        return view('livewire.servicio.vacuna.lw-index', compact('vacunas'));
    }
}
