<?php

namespace App\Http\Controllers\Sistema;

use App\Http\Controllers\Controller;
use App\Models\Bitacora;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{

    public function index()
    {
        return view('sistema.user.index');
    }

    public function create()
    {
        $roles = Role::all();
        return view('sistema.user.create', compact('roles'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
            'role' => 'required',
        ], [
            'name.required' => 'El campo nombre es obligatorio',
            'email.required' => 'El campo email es obligatorio',
            'password.required' => 'El campo contraseña es obligatorio',
            'role.required' => 'El campo rol es obligatorio',
        ]);
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
        $user->assignRole($request->role);

        Bitacora::Bitacora('C', 'usuarios', $user->id);
        return redirect()->route('usuario.index');
    }

    public function edit($id)
    {
        $user = User::find($id);
        $roles = Role::all();
        return view('sistema.user.edit', compact('user', 'roles'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
        ], [
            'name.required' => 'El campo nombre es obligatorio',
            'email.required' => 'El campo email es obligatorio',
        ]);
        $user = User::find($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->save();
        if ($request->role != null) {
            if ($user->roles->first()) {
                $user->removeRole($user->roles->first()->name);
            }
            $user->syncRoles($request->role);
        }

        Bitacora::Bitacora('U', 'usuarios', $user->id);
        return redirect()->route('usuario.index');
    }

    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();
        Bitacora::Bitacora('D', 'usuarios', $user->id);
        return redirect()->route('usuario.index');
    }
}
