<?php

namespace App\Http\Controllers\Servicio;

use App\Http\Controllers\Controller;
use App\Models\Bitacora;
use App\Models\Cliente;
use App\Models\Mascota;
use Illuminate\Http\Request;

class MascotaController extends Controller
{
    public function index()
    {
        return view('servicio.mascota.index');
    }

    public function create()
    {
        $clientes = Cliente::all();
        return view('servicio.mascota.create', compact('clientes'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required',
            'sexo' => 'required',
            'especie' => 'required',
            'raza' => 'required',
            'fecha_nacimiento' => 'required|date',
            'cliente_id' => 'required',
        ], [
            'nombre.required' => 'El campo nombre es obligatorio',
            'sexo.required' => 'El campo sexo es obligatorio',
            'especie.required' => 'El campo especie es obligatorio',
            'raza.required' => 'El campo raza es obligatorio',
            'fecha_nacimiento.required' => 'El campo fecha de nacimiento es obligatorio',
            'fecha_nacimiento.date' => 'El campo fecha de nacimiento debe ser una fecha',
            'cliente_id.required' => 'El campo dueño es obligatorio',
        ]);
        // calcular la edad de la mascota mediante la fecha de nacimiento con carbon
        $edad = \Carbon\Carbon::parse($request->fecha_nacimiento)->age;
        $mascota = Mascota::create([
            'nombre' => $request->nombre,
            'sexo' => $request->sexo,
            'especie' => $request->especie,
            'raza' => $request->raza,
            'fecha_nacimiento' => $request->fecha_nacimiento,
            'cliente_id' => $request->cliente_id,
            'edad' => $edad,
        ]);
        Bitacora::Bitacora('C', 'Mascota', $mascota->id);
        return redirect()->route('mascota.index');
    }

    public function edit($id)
    {
        $mascota = Mascota::find($id);
        return view('servicio.mascota.edit', compact('mascota'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nombre' => 'required',
            'edad' => 'required|numeric',
            'sexo' => 'required',
            'especie' => 'required',
            'raza' => 'required',
            'fecha_nacimiento' => 'required|date',
            'cliente_id' => 'required',
        ], [
            'nombre.required' => 'El campo nombre es obligatorio',
            'edad.required' => 'El campo edad es obligatorio',
            'edad.numeric' => 'El campo edad debe ser un número',
            'sexo.required' => 'El campo sexo es obligatorio',
            'especie.required' => 'El campo especie es obligatorio',
            'raza.required' => 'El campo raza es obligatorio',
            'fecha_nacimiento.required' => 'El campo fecha de nacimiento es obligatorio',
            'fecha_nacimiento.date' => 'El campo fecha de nacimiento debe ser una fecha',
            'cliente_id.required' => 'El campo cliente es obligatorio',
        ]);
        $mascota = Mascota::find($id);
        $mascota->update($request->all());
        Bitacora::Bitacora('U', 'Mascota', $mascota->id);
        return redirect()->route('mascota.index');
    }

    public function show($id)
    {
        $mascota = Mascota::find($id);
        return view('servicio.mascota.show', compact('mascota'));
    }

    public function destroy($id)
    {
        $mascota = Mascota::find($id);
        $mascota->delete();
        Bitacora::Bitacora('D', 'Mascota', $mascota->id);
        return redirect()->route('mascota.index');
    }
}
