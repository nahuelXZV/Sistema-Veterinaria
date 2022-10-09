<?php

namespace App\Http\Controllers\CompraVenta;

use App\Http\Controllers\Controller;
use App\Models\Bitacora;
use App\Models\Producto;
use Illuminate\Http\Request;

class ProductoController extends Controller
{
    public function index()
    {
        return view('compra_venta.producto.index');
    }

    public function create()
    {
        return view('compra_venta.producto.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required',
            'precio' => 'required',
            'tipo' => 'required',
            'cantidad' => 'required|numeric',
            'fecha_vencimiento' => 'required|date',
        ], [
            'nombre.required' => 'El campo nombre es obligatorio',
            'precio.required' => 'El campo precio es obligatorio',
            'tipo.required' => 'El campo tipo es obligatorio',
            'cantidad.required' => 'El campo cantidad es obligatorio',
            'cantidad.numeric' => 'El campo cantidad debe ser un número',
            'fecha_vencimiento.required' => 'El campo fecha de vencimiento es obligatorio',
            'fecha_vencimiento.date' => 'El campo fecha de vencimiento debe ser una fecha',
        ]);

        $producto = Producto::create($request->all());
        Bitacora::Bitacora('C', 'Producto', $producto->id);
        return redirect()->route('producto.index');
    }

    public function edit($id)
    {
        $producto = Producto::find($id);
        return view('compra_venta.producto.edit', compact('producto'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nombre' => 'required',
            'precio' => 'required|numeric',
            'tipo' => 'required',
            'cantidad' => 'required|numeric',
            'fecha_vencimiento' => 'required|date',
        ], [
            'nombre.required' => 'El campo nombre es obligatorio',
            'precio.required' => 'El campo precio es obligatorio',
            'precio.numeric' => 'El campo precio debe ser un número',
            'tipo.required' => 'El campo tipo es obligatorio',
            'cantidad.required' => 'El campo cantidad es obligatorio',
            'cantidad.numeric' => 'El campo cantidad debe ser un número',
            'fecha_vencimiento.required' => 'El campo fecha de vencimiento es obligatorio',
            'fecha_vencimiento.date' => 'El campo fecha de vencimiento debe ser una fecha',
        ]);
        $producto = Producto::find($id);
        $producto->update($request->all());
        Bitacora::Bitacora('U', 'Producto', $producto->id);
        return redirect()->route('producto.index');
    }

    public function destroy($id)
    {
        $producto = Producto::find($id);
        $producto->delete();
        Bitacora::Bitacora('D', 'Producto', $producto->id);
        return redirect()->route('producto.index');
    }

    public function show($id)
    {
        $producto = Producto::find($id);
        return view('compra_venta.producto.show', compact('producto'));
    }
}
