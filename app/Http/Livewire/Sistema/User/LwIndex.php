<?php

namespace App\Http\Livewire\Sistema\User;

use App\Models\User;
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
        $users = User::where('name', 'ILIKE', '%' . strtolower($this->attribute) . '%')
            ->orWhere('email', 'ILIKE', '%' . strtolower($this->attribute) . '%')
            ->orderBy('id', 'desc')
            ->paginate(20);
        return view('livewire.sistema.user.lw-index', compact('users'));
    }
}
