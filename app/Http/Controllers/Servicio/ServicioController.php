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
        return view('compra_venta.producto.index');
    }

    public function create()
    {
        return view('compra_venta.producto.create');
    }

    public function store(Request $request)
    {
        return redirect()->route('producto.index');
    }

    public function edit($id)
    {
        return view('compra_venta.producto.edit', compact('producto'));
    }

    public function update(Request $request, $id)
    {
        return redirect()->route('producto.index');
    }

    public function destroy($id)
    {
        $servicio = Servicio::find($id);
        Bitacora::Bitacora('D', 'Producto', $servicio->id);
        $servicio->delete();
        return redirect()->route('producto.index');
    }

    public function show($id)
    {
        $servicio = Servicio::find($id);
        return view('compra_venta.producto.show', compact('servicio'));
    }
}
