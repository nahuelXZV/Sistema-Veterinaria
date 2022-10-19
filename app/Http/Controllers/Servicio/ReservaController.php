<?php

namespace App\Http\Controllers\Servicio;

use App\Http\Controllers\Controller;
use App\Models\Bitacora;
use App\Models\Cliente;
use App\Models\Reserva;
use Illuminate\Http\Request;

class ReservaController extends Controller
{
    public function index()
    {
        return view('servicio.reserva.index');
    }

    public function create()
    {
        $clientes = Cliente::all();
        return view('servicio.reserva.create', compact('clientes'));
    }

    public function store(Request $request)
    {
        // retornar error de validacion manualmente
        $request->validate([
            'fecha_atencion' => 'required',
            'hora_atencion' => 'required',
            'cliente_id' => 'required',
        ], [
            'fecha_atencion.required' => 'La fecha de atención es requerida',
            'hora_atencion.required' => 'La hora de atención es requerida',
            'cliente_id.required' => 'El cliente es requerido',
        ]);

        // aumentar media hora a hora_atencion
        $existe = Reserva::where('fecha_atencion', $request->fecha_atencion)
            ->where('hora_atencion', '=', $request->hora_atencion)
            ->first();

        if ($existe) {
            return redirect()->back()->with('fecha_validate', 'Ya existe una reserva para la fecha y hora seleccionada');
        }
        $request->merge([
            'estado' => 'Pendiente',
        ]);
        $reserva = Reserva::create($request->all());
        Bitacora::Bitacora('C', 'Reserva', $reserva->id);
        return redirect()->route('reserva.index');
    }

    public function edit($id)
    {
        $reserva = Reserva::find($id);
        return view('servicio.reserva.edit', compact('reserva'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'fecha_atencion' => 'required',
            'hora_atencion' => 'required',
        ], [
            'fecha_atencion.required' => 'La fecha de atención es requerida',
            'hora_atencion.required' => 'La hora de atención es requerida',
        ]);

        $existe = Reserva::where('fecha_atencion', $request->fecha_atencion)
            ->where('hora_atencion', '=', $request->hora_atencion)
            ->where('id', '!=', $id)
            ->first();

        if ($existe) {
            return redirect()->back()->with('fecha_validate', 'Ya existe una reserva para la fecha y hora seleccionada');
        }
        $reserva = Reserva::find($id);
        $reserva->update($request->all());
        Bitacora::Bitacora('U', 'Reserva', $reserva->id);
        return redirect()->route('reserva.index');
    }

    public function destroy($id)
    {
        $reserva = Reserva::find($id);
        Bitacora::Bitacora('D', 'reserva', $reserva->id);
        $reserva->delete();
        return redirect()->route('reserva.index');
    }

    public function show($id)
    {
        $reserva = Reserva::find($id);
        return view('servicio.reserva.show', compact('reserva'));
    }

    public function atencion($id)
    {
        return view('servicio.atencion.create', compact('id'));
    }
}
