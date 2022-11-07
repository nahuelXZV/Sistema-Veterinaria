<?php

namespace App\Http\Livewire\Sistema\Bitacora;

use Livewire\WithPagination;
use App\Models\Bitacora;
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
        $bitacoras = Bitacora::join('users', 'users.id', '=', 'bitacoras.user_id')
            ->select('bitacoras.*', 'users.*')
            ->where('bitacoras.accion', 'ILIKE', '%' . $this->attribute . '%')
            ->orWhere('bitacoras.tabla', 'ILIKE', '%' . $this->attribute . '%')
            ->orWhere('users.name', 'ILIKE', '%' . $this->attribute . '%')
            ->orderBy('bitacoras.id', 'desc')
            ->paginate(30);
        return view('livewire.sistema.bitacora.lw-index', compact('bitacoras'));
    }
}
