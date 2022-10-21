<?php

namespace App\Http\Livewire\Servicio\Mascota;

use App\Models\Atencion;
use App\Models\Mascota;
use Livewire\Component;
use Livewire\WithPagination;

class LwAtencion extends Component
{
    use WithPagination;
    public $attribute = '';
    public $mascota;

    public function mount($id)
    {
        $this->mascota = Mascota::find($id);
    }

    //Metodo de reinicio de buscador
    public function updatingAttribute()
    {
        $this->resetPage();
    }

    public function render()
    {
        $atenciones = Atencion::where('mascota_id', $this->mascota->id)
            ->orderBy('id', 'desc')
            ->paginate(20);
        return view('livewire.servicio.mascota.lw-atencion', compact('atenciones'));
    }
}
