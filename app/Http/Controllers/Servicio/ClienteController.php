<?php

namespace App\Http\Controllers\Servicio;

use App\Http\Controllers\Controller;
use App\Models\Bitacora;
use App\Models\Cliente;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
    public function index()
    {
        return view('servicio.cliente.index');
    }

    public function create()
    {
        return view('servicio.cliente.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required',
            'telefono' => 'required',
            'direccion' => 'required',
            'correo' => 'required',
        ], [
            'nombre.required' => 'El campo nombre es obligatorio',
            'telefono.required' => 'El campo telefono es obligatorio',
            'direccion.required' => 'El campo direccion es obligatorio',
            'correo.required' => 'El campo correo es obligatorio',
        ]);
        $cliente = Cliente::create($request->all());
        Bitacora::Bitacora('C', 'Clientes', $cliente->id);
        return redirect()->route('cliente.index');
    }

    public function edit($id)
    {
        $cliente = Cliente::find($id);
        return view('servicio.cliente.edit', compact('cliente'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nombre' => 'required',
            'telefono' => 'required',
            'direccion' => 'required',
            'correo' => 'required',
        ], [
            'nombre.required' => 'El campo nombre es obligatorio',
            'telefono.required' => 'El campo telefono es obligatorio',
            'direccion.required' => 'El campo direccion es obligatorio',
            'correo.required' => 'El campo correo es obligatorio',
        ]);
        $cliente = Cliente::find($id);
        $cliente->update($request->all());
        Bitacora::Bitacora('U', 'Clientes', $cliente->id);
        return redirect()->route('cliente.index');
    }

    public function show($id)
    {
        $cliente = Cliente::find($id);
        $mascotas = $cliente->mascotas;
        return view('servicio.cliente.show', compact('cliente', 'mascotas'));
    }

    public function destroy($id)
    {
        $cliente = Cliente::find($id);
        Bitacora::Bitacora('D', 'Clientes', $cliente->id);
        $cliente->delete();
        return redirect()->route('cliente.index');
    }
}
