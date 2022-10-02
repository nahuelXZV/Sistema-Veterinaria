<?php

namespace App\Http\Controllers\Sistema;

use App\Http\Controllers\Controller;
use App\Models\Bitacora;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    public function index()
    {
        return view('sistema.rol.index');
    }
    public function edit($id)
    {
        return view('sistema.rol.edit', compact('id'));
    }
    public function create()
    {
        return view('sistema.rol.create');
    }
    public function destroy($id)
    {
        $role = Role::find($id);
        $role->delete();
        Bitacora::Bitacora('D', 'Roles', $id);
        return redirect()->route('roles.index');
    }
}
