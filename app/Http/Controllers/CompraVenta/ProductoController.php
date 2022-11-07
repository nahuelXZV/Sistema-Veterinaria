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
            'precio' => 'required|numeric',
            'tipo' => 'required',
            'cantidad' => 'required|numeric',
        ], [
            'nombre.required' => 'El campo nombre es obligatorio',
            'precio.required' => 'El campo precio es obligatorio',
            'precio.numeric' => 'El campo precio debe ser un número, no se aceptan comas',
            'tipo.required' => 'El campo tipo es obligatorio',
            'cantidad.required' => 'El campo cantidad es obligatorio',
            'cantidad.numeric' => 'El campo cantidad debe ser un número',
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
        ], [
            'nombre.required' => 'El campo nombre es obligatorio',
            'precio.required' => 'El campo precio es obligatorio',
            'precio.numeric' => 'El campo precio debe ser un número, no se aceptan comas',
            'tipo.required' => 'El campo tipo es obligatorio',
            'cantidad.required' => 'El campo cantidad es obligatorio',
            'cantidad.numeric' => 'El campo cantidad debe ser un número',
        ]);
        $producto = Producto::find($id);
        $producto->update($request->all());
        Bitacora::Bitacora('U', 'Producto', $producto->id);
        return redirect()->route('producto.index');
    }

    public function destroy($id)
    {
        $producto = Producto::find($id);
        Bitacora::Bitacora('D', 'Producto', $producto->id);
        $producto->delete();
        return redirect()->route('producto.index');
    }

    public function show($id)
    {
        $producto = Producto::find($id);
        return view('compra_venta.producto.show', compact('producto'));
    }
}
