<?php

namespace App\Http\Controllers\Servicio;

use App\Http\Controllers\Controller;
use App\Models\Bitacora;
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
        return view('servicio.reserva.create');
    }

    public function store(Request $request)
    {
        return redirect()->route('reserva.index');
    }

    public function edit($id)
    {
        return view('servicio.reserva.edit', compact('reserva'));
    }

    public function update(Request $request, $id)
    {
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
}
