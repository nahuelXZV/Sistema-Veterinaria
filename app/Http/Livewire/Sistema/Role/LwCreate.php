<?php

namespace App\Http\Livewire\Sistema\Role;

use App\Models\Bitacora;
use Livewire\Component;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class LwCreate extends Component
{
    public $name;
    public $permisos = [];

    public function add()
    {
        $this->validate([
            'name' => 'required|unique:roles',
        ]);
        $rol = Role::create([
            'name' => $this->name,
            'guard_name' => 'web'
        ]);
        foreach ($this->permisos as $permiso) {
            $rol->givePermissionTo($permiso);
        }
        Bitacora::Bitacora('C', 'Roles',  $rol->id);
        return redirect()->route('roles.index');
    }

    public function render()
    {
        $permissions = Permission::all();
        return view('livewire.sistema.role.lw-create', compact('permissions'));
    }
}
