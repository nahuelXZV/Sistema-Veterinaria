<?php

namespace App\Http\Livewire\Sistema\Role;

use App\Models\Bitacora;
use Livewire\Component;
use Livewire\WithPagination;
use Spatie\Permission\Models\Role;

class LwIndex extends Component
{
    use WithPagination;
    public $attribute = '';

    public function updatingAttribute()
    {
        $this->resetPage();
    }

    public function delete($id)
    {
        $rol = Role::find($id);
        $rol->delete();
        Bitacora::Bitacora('D', 'Roles', $rol->id);
    }
    public function render()
    {
        $roles = Role::where('name', 'ILIKE', '%' . $this->attribute . '%')
            ->orderBy('id', 'desc')
            ->paginate(20);
        return view('livewire.sistema.role.lw-index', compact('roles'));
    }
}
