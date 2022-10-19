<?php

namespace App\Http\Controllers\Servicio;

use App\Http\Controllers\Controller;
use App\Models\Bitacora;
use App\Models\Vacuna;
use Illuminate\Http\Request;

class VacunaController extends Controller
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
        $vacuna = Vacuna::find($id);
        Bitacora::Bitacora('D', 'Producto', $vacuna->id);
        $vacuna->delete();
        return redirect()->route('producto.index');
    }

    public function show($id)
    {
        $vacuna = Vacuna::find($id);
        return view('compra_venta.producto.show', compact('vacuna'));
    }
}
