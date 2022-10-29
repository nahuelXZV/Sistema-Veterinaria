<?php

namespace App\Http\Controllers\Servicio;

use App\Http\Controllers\Controller;
use App\Models\Bitacora;
use App\Models\Vacuna;
use Illuminate\Http\Request;

class VacunaController extends Controller
{
    public function index()
    {
        return view('servicio.vacuna.index');
    }

    public function create()
    {
        return view('servicio.vacuna.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required',
            'descripcion' => 'required',
        ], [
            'nombre.required' => 'El campo nombre es obligatorio',
            'descripcion.required' => 'El campo descripcion es obligatorio',
        ]);
        $vacuna = Vacuna::create($request->all());
        Bitacora::Bitacora('C', 'Vacuna', $vacuna->id);
        return redirect()->route('vacuna.index');
    }

    public function edit($id)
    {
        $vacuna = Vacuna::find($id);
        return view('servicio.vacuna.edit', compact('vacuna'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nombre' => 'required',
            'descripcion' => 'required',
        ], [
            'nombre.required' => 'El campo nombre es obligatorio',
            'descripcion.required' => 'El campo descripcion es obligatorio',
        ]);
        $vacuna = Vacuna::find($id);
        $vacuna->update($request->all());
        Bitacora::Bitacora('U', 'Vacuna', $vacuna->id);
        return redirect()->route('vacuna.index');
    }

    public function destroy($id)
    {
        $vacuna = Vacuna::find($id);
        Bitacora::Bitacora('D', 'Vacuna', $vacuna->id);
        $vacuna->delete();
        return redirect()->route('vacuna.index');
    }
}
