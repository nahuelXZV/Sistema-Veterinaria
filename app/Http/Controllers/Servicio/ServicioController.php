<?php

namespace App\Http\Controllers\Servicio;

use App\Http\Controllers\Controller;
use App\Models\Bitacora;
use App\Models\Servicio;
use Illuminate\Http\Request;

class ServicioController extends Controller
{
    public function index()
    {
        return view('servicio.servicio.index');
    }

    public function create()
    {
        return view('servicio.servicio.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required',
            'precio' => 'required|numeric',
            'descripcion' => 'required',
        ], [
            'nombre.required' => 'El campo nombre es obligatorio',
            'precio.required' => 'El campo precio es obligatorio',
            'precio.numeric' => 'El campo precio debe ser un numero',
            'descripcion.required' => 'El campo descripcion es obligatorio',
        ]);
        $servicio = Servicio::create($request->all());
        Bitacora::Bitacora('C', 'Servicio', $servicio->id);
        return redirect()->route('servicio.index');
    }

    public function edit($id)
    {
        $servicio = Servicio::find($id);
        return view('servicio.servicio.edit', compact('servicio'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nombre' => 'required',
            'precio' => 'required|numeric',
            'descripcion' => 'required',
        ], [
            'nombre.required' => 'El campo nombre es obligatorio',
            'precio.required' => 'El campo precio es obligatorio',
            'precio.numeric' => 'El campo precio debe ser un numero',
            'descripcion.required' => 'El campo descripcion es obligatorio',
        ]);
        $servicio = Servicio::find($id);
        $servicio->update($request->all());
        Bitacora::Bitacora('U', 'Servicio', $servicio->id);
        return redirect()->route('servicio.index');
    }

    public function destroy($id)
    {
        $servicio = Servicio::find($id);
        Bitacora::Bitacora('D', 'Servicio', $servicio->id);
        $servicio->delete();
        return redirect()->route('servicio.index');
    }

    public function show($id)
    {
        $servicio = Servicio::find($id);
        return view('servicio.servicio.show', compact('servicio'));
    }
}
