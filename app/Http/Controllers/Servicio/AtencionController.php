<?php

namespace App\Http\Controllers\Servicio;

use App\Http\Controllers\Controller;
use App\Models\Atencion;
use App\Models\Bitacora;
use App\Models\Cliente;
use App\Models\DetalleRecibo;
use App\Models\DetalleServicio;
use App\Models\Recibo;
use Illuminate\Http\Request;
use App\Http\Controllers\Reportes\Recibo as ReporteRecibo;
use App\Http\Controllers\Reportes\Atencion as ReporteAtencion;

class AtencionController extends Controller
{
    public function index()
    {
        return view('servicio.atencion.index');
    }

    public function create()
    {
        return view('servicio.atencion.create');
    }

    public function recibo($id)
    {
        return view('servicio.atencion.recibo', compact('id'));
    }

    public function recibo_store(Request $request)
    {
        return view('servicio.atencion.create');
    }

    public function edit($id)
    {
        return view('servicio.atencion.edit', compact('id'));
    }

    public function destroy($id)
    {
        $atencion = Atencion::find($id);
        Bitacora::Bitacora('D', 'atencion', $atencion->id);
        $atencion->delete();
        return redirect()->route('atencion.index');
    }

    public function show($id)
    {
        $atencion = Atencion::find($id);
        $recibo = Recibo::where('atencion_id', $atencion->id)->first();
        return view('servicio.atencion.show', compact('atencion', 'recibo'));
    }

    public function recibo_show($id)
    {
        $atencion = Atencion::find($id);
        $recibo = Recibo::where('atencion_id', $id)->first();
        $detalleProductos = DetalleRecibo::where('recibo_id', $recibo->id)->get();
        $detalleServicios = DetalleServicio::where('recibo_id', $recibo->id)->get();
        // unir dos vectores
        $listaTotal = $detalleProductos->concat($detalleServicios);
        return view('servicio.atencion.recibo_show', compact('recibo', 'atencion', 'listaTotal'));
    }

    public function descargar_recibo($id)
    {
        $recibo = new ReporteRecibo();
        Bitacora::Bitacora('R', 'Recibo', $id);
        return $recibo->descargar($id);
    }

    public function descargar_atencion($id)
    {
        $atencion = new ReporteAtencion();
        Bitacora::Bitacora('R', 'Atencion', $id);
        return $atencion->descargar($id);
    }
}
