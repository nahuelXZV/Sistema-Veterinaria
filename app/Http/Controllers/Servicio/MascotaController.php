<?php

namespace App\Http\Controllers\Servicio;

use App\Http\Controllers\Controller;
use App\Models\Bitacora;
use App\Models\Cliente;
use App\Models\Mascota;
use App\Models\MascotaVacuna;
use App\Models\Vacuna;
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
            'sexo' => 'required',
            'especie' => 'required',
            'raza' => 'required',
            'fecha_nacimiento' => 'required|date',
        ], [
            'nombre.required' => 'El campo nombre es obligatorio',
            'sexo.required' => 'El campo sexo es obligatorio',
            'especie.required' => 'El campo especie es obligatorio',
            'raza.required' => 'El campo raza es obligatorio',
            'fecha_nacimiento.required' => 'El campo fecha de nacimiento es obligatorio',
            'fecha_nacimiento.date' => 'El campo fecha de nacimiento debe ser una fecha',
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
        Bitacora::Bitacora('D', 'Mascota', $mascota->id);
        $mascota->delete();
        return redirect()->route('mascota.index');
    }

    public function vacunar($id)
    {
        $mascota = Mascota::find($id);
        $vacunas_realizadas = MascotaVacuna::where('mascota_id', $id)->get();
        $vacunas_realizadas_id = $vacunas_realizadas->pluck('id');
        $vacunas = Vacuna::whereNotIn('id', $vacunas_realizadas_id)->get();
        return view('servicio.mascota.vacunar', compact('vacunas', 'mascota'));
    }

    public function store_vacunar(Request $request)
    {
        $request->validate([
            'mascota_id' => 'required',
            'vacuna_id' => 'required',
            'fecha' => 'required|date',
        ], [
            'mascota_id.required' => 'El campo mascota es obligatorio',
            'vacuna_id.required' => 'El campo vacuna es obligatorio',
            'fecha.required' => 'El campo fecha es obligatorio',
            'fecha.date' => 'El campo fecha debe ser una fecha',
        ]);
        $mascota = Mascota::find($request->mascota_id);
        MascotaVacuna::create($request->all());
        return redirect()->route('mascota.show', $mascota->id);
    }
}
