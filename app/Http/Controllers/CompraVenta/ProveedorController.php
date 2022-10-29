<?php

namespace App\Http\Controllers\CompraVenta;

use App\Http\Controllers\Controller;
use App\Models\Bitacora;
use App\Models\Proveedor;
use Illuminate\Http\Request;

class ProveedorController extends Controller
{
    public function index()
    {
        return view('compra_venta.proveedor.index');
    }

    public function create()
    {
        return view('compra_venta.proveedor.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required',
            'telefono' => 'required',
            'correo' => 'required',
            'direccion' => 'required',
            'tipo' => 'required',
        ], [
            'nombre.required' => 'El campo nombre es obligatorio',
            'telefono.required' => 'El campo telefono es obligatorio',
            'correo.required' => 'El campo correo es obligatorio',
            'direccion.required' => 'El campo direccion es obligatorio',
            'tipo.required' => 'El campo tipo es obligatorio',
        ]);

        $proveedor = Proveedor::create($request->all());
        Bitacora::Bitacora('C', 'Proveedor', $proveedor->id);
        return redirect()->route('proveedor.index');
    }

    public function edit($id)
    {
        $proveedor = Proveedor::find($id);
        return view('compra_venta.proveedor.edit', compact('proveedor'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nombre' => 'required',
            'telefono' => 'required',
            'correo' => 'required',
            'direccion' => 'required',
            'tipo' => 'required',
        ], [
            'nombre.required' => 'El campo nombre es obligatorio',
            'telefono.required' => 'El campo telefono es obligatorio',
            'correo.required' => 'El campo correo es obligatorio',
            'direccion.required' => 'El campo direccion es obligatorio',
            'tipo.required' => 'El campo tipo es obligatorio',
        ]);
        $proveedor = Proveedor::find($id);
        $proveedor->update($request->all());
        Bitacora::Bitacora('U', 'Proveedor', $proveedor->id);
        return redirect()->route('proveedor.index');
    }

    public function destroy($id)
    {
        $proveedor = Proveedor::find($id);
        $proveedor->delete();
        Bitacora::Bitacora('D', 'Proveedor', $proveedor->id);
        return redirect()->route('proveedor.index');
    }
}
