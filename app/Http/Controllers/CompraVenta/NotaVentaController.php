<?php

namespace App\Http\Controllers\CompraVenta;

use App\Http\Controllers\Controller;
use App\Models\Bitacora;
use App\Models\NotaVenta;
use Illuminate\Http\Request;

class NotaVentaController extends Controller
{
    public function index()
    {
        return view('compra_venta.nota_venta.index');
    }

    public function create()
    {
        return view('compra_venta.nota_venta.create');
    }

    public function edit($id)
    {
        $nota_venta = NotaVenta::find($id);
        return view('compra_venta.nota_venta.edit', compact('nota_venta'));
    }

    public function destroy($id)
    {
        $nota_venta = NotaVenta::find($id);
        Bitacora::Bitacora('D', 'Nota de Venta', $nota_venta->id);
        $nota_venta->delete();
        return redirect()->route('nota_venta.index');
    }

    public function show($id)
    {
        $nota = NotaVenta::find($id);
        $lista_productos = $nota->detalle_nota_ventas;
        return view('compra_venta.nota_venta.show', compact('nota', 'lista_productos'));
    }
}
