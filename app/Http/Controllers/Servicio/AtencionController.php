<?php

namespace App\Http\Controllers\Servicio;

use App\Http\Controllers\Controller;
use App\Models\Atencion;
use App\Models\Bitacora;
use App\Models\Cliente;
use Illuminate\Http\Request;

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

    public function recibo()
    {
        return view('servicio.atencion.recibo');
    }

    public function recibo_store(Request $request)
    {
        return view('servicio.atencion.create');
    }

    public function edit($id)
    {
        return view('servicio.atencion.edit', compact('atencion'));
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
        return view('servicio.atencion.show', compact('atencion'));
    }
}
