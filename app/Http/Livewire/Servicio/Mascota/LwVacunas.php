<?php

namespace App\Http\Livewire\Servicio\Mascota;

use App\Models\Mascota;
use App\Models\MascotaVacuna;
use Livewire\Component;
use Livewire\WithPagination;

class LwVacunas extends Component
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
        $vacunas = MascotaVacuna::where('mascota_id', $this->mascota->id)
            ->orderBy('id', 'desc')
            ->paginate(20);
        return view('livewire.servicio.mascota.lw-vacunas', compact('vacunas'));
    }
}
