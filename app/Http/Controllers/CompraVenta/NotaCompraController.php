<?php

namespace App\Http\Controllers\CompraVenta;

use App\Http\Controllers\Controller;
use App\Models\Bitacora;
use App\Models\NotaCompra;
use Illuminate\Http\Request;

class NotaCompraController extends Controller
{
    public function index()
    {
        return view('compra_venta.nota_compra.index');
    }

    public function create()
    {
        return view('compra_venta.nota_compra.create');
    }

    public function edit($id)
    {
        $nota_compra = NotaCompra::find($id);
        return view('compra_venta.nota_compra.edit', compact('nota_compra'));
    }

    public function destroy($id)
    {
        $nota_compra = NotaCompra::find($id);
        // devolver el stock a los productos
        $detalles = $nota_compra->detalle_nota_compras;
        foreach ($detalles as $detalle) {
            $producto = $detalle->producto;
            $producto->cantidad -= $detalle->cantidad;
            $producto->save();
        }
        Bitacora::Bitacora('D', 'Nota de Compra', $nota_compra->id);
        $nota_compra->delete();
        return redirect()->route('nota_compra.index');
    }

    public function show($id)
    {
        $nota = NotaCompra::find($id);
        $lista_productos = $nota->detalle_nota_compras;
        return view('compra_venta.nota_compra.show', compact('nota', 'lista_productos'));
    }
}
