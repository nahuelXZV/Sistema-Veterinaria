<?php

namespace App\Http\Livewire\Sistema\Role;

use App\Models\Bitacora;
use Livewire\Component;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class LwEdit extends Component
{
    public $rol;
    public $name;
    public $permisos;
    public $permisosV = [];

    public function mount($id)
    {
        $this->rol = Role::find($id);
        $this->name = $this->rol->name;
        $this->permisos = $this->rol->getAllPermissions()->pluck('id')->toArray();
        foreach ($this->permisos as $permiso) {
            $this->permisosV[$permiso] = $permiso;
        }
    }

    public function add()
    {
        $this->validate([
            'name' => 'required',
        ]);
        $this->rol->name = $this->name;
        $this->rol->syncPermissions($this->permisosV);
        $this->rol->save();
        Bitacora::Bitacora('U', 'Roles',  $this->rol->id);
        return redirect()->route('roles.index');
    }

    public function render()
    {
        $permisosDB = Permission::all();
        return view('livewire.sistema.role.lw-edit', compact('permisosDB'));
    }
}
