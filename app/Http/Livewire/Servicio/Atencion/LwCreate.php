<?php

namespace App\Http\Livewire\Servicio\Atencion;

use App\Models\Atencion;
use App\Models\Bitacora;
use App\Models\Cliente;
use App\Models\Reserva;
use App\Models\Tratamiento;
use Livewire\Component;

class LwCreate extends Component
{
    public $clientes;
    public $datos = [];
    public $reserva;

    public function mount($id = null)
    {
        if ($id != null) {
            $this->reserva = Reserva::find($id);
            $this->datos['cliente_id'] = $this->reserva->cliente_id;
            $this->datos['reserva_id'] = $this->reserva->id;
        } else {
            $this->clientes = Cliente::all();
            $this->datos['cliente_id'] = null;
        }
        $this->datos['observaciones'] = '';
        $this->datos['indicaciones'] = '';
    }

    public function save()
    {
        $this->validate([
            'datos.cliente_id' => 'required|numeric',
            'datos.mascota_id' => 'required|numeric',
            'datos.peso' => 'required|numeric',
            'datos.temperatura' => 'required|numeric',
            'datos.frecuencia_cardiaca' => 'required|numeric',
            'datos.frecuencia_respiratoria' => 'required|numeric',
        ], [
            'datos.cliente_id.required' => 'El campo cliente es obligatorio',
            'datos.cliente_id.numeric' => 'El campo cliente debe ser un número',
            'datos.mascota_id.required' => 'El campo mascota es obligatorio',
            'datos.mascota_id.numeric' => 'El campo mascota debe ser un número',
            'datos.peso.required' => 'El campo peso es obligatorio',
            'datos.peso.numeric' => 'El campo peso debe ser un número',
            'datos.temperatura.required' => 'El campo temperatura es obligatorio',
            'datos.temperatura.numeric' => 'El campo temperatura debe ser un número',
            'datos.frecuencia_cardiaca.required' => 'El campo frecuencia cardiaca es obligatorio',
            'datos.frecuencia_cardiaca.numeric' => 'El campo frecuencia cardiaca debe ser un número',
            'datos.frecuencia_respiratoria.required' => 'El campo frecuencia respiratoria es obligatorio',
            'datos.frecuencia_respiratoria.numeric' => 'El campo frecuencia respiratoria debe ser un número',
            'datos.anamnesis.required' => 'El campo anamnesis es obligatorio',
            'datos.anamnesis.string' => 'El campo anamnesis debe ser un texto',
        ]);

        $atencion = Atencion::create($this->datos);
        if ($this->datos['observaciones'] != null || $this->datos['indicaciones'] != null) {
            $this->validate([
                'datos.observaciones' => 'required|string',
                'datos.indicaciones' => 'required|string',
            ], [
                'datos.observaciones.required' => 'El campo observaciones es obligatorio',
                'datos.observaciones.string' => 'El campo observaciones debe ser un texto',
                'datos.indicaciones.required' => 'El campo indicaciones es obligatorio',
                'datos.indicaciones.string' => 'El campo indicaciones debe ser un texto',
            ]);

            Tratamiento::create([
                'atencion_id' => $atencion->id,
                'observaciones' => $this->datos['observaciones'],
                'indicaciones' => $this->datos['indicaciones'],
            ]);
        }
        if ($this->reserva != null) {
            $this->reserva->estado = 'Atendido';
            $this->reserva->save();
        }
        Bitacora::Bitacora('C', 'Atencion', $atencion->id);
        return redirect()->route('atencion.index');
    }

    public function recibo()
    {
        $this->validate([
            'datos.cliente_id' => 'required|numeric',
            'datos.mascota_id' => 'required|numeric',
            'datos.peso' => 'required|numeric',
            'datos.temperatura' => 'required|numeric',
            'datos.frecuencia_cardiaca' => 'required|numeric',
            'datos.frecuencia_respiratoria' => 'required|numeric',
        ], [
            'datos.cliente_id.required' => 'El campo cliente es obligatorio',
            'datos.cliente_id.numeric' => 'El campo cliente debe ser un número',
            'datos.mascota_id.required' => 'El campo mascota es obligatorio',
            'datos.mascota_id.numeric' => 'El campo mascota debe ser un número',
            'datos.peso.required' => 'El campo peso es obligatorio',
            'datos.peso.numeric' => 'El campo peso debe ser un número',
            'datos.temperatura.required' => 'El campo temperatura es obligatorio',
            'datos.temperatura.numeric' => 'El campo temperatura debe ser un número',
            'datos.frecuencia_cardiaca.required' => 'El campo frecuencia cardiaca es obligatorio',
            'datos.frecuencia_cardiaca.numeric' => 'El campo frecuencia cardiaca debe ser un número',
            'datos.frecuencia_respiratoria.required' => 'El campo frecuencia respiratoria es obligatorio',
            'datos.frecuencia_respiratoria.numeric' => 'El campo frecuencia respiratoria debe ser un número',
            'datos.anamnesis.required' => 'El campo anamnesis es obligatorio',
            'datos.anamnesis.string' => 'El campo anamnesis debe ser un texto',
        ]);

        $atencion = Atencion::create($this->datos);
        if ($this->datos['observaciones'] != null || $this->datos['indicaciones'] != null) {
            $this->validate([
                'datos.observaciones' => 'required|string',
                'datos.indicaciones' => 'required|string',
            ], [
                'datos.observaciones.required' => 'El campo observaciones es obligatorio',
                'datos.observaciones.string' => 'El campo observaciones debe ser un texto',
                'datos.indicaciones.required' => 'El campo indicaciones es obligatorio',
                'datos.indicaciones.string' => 'El campo indicaciones debe ser un texto',
            ]);
            Tratamiento::create([
                'atencion_id' => $atencion->id,
                'observaciones' => $this->datos['observaciones'],
                'indicaciones' => $this->datos['indicaciones'],
            ]);
        }
        if ($this->reserva != null) {
            $this->reserva->estado = 'Atendido';
            $this->reserva->save();
        }
        Bitacora::Bitacora('C', 'Atencion', $atencion->id);
        return redirect()->route('atencion.recibo', $atencion->id);
    }

    public function render()
    {
        if ($this->datos['cliente_id'] != null) {
            $mascotas = Cliente::find($this->datos['cliente_id'])->mascotas;
        } else {
            $mascotas = [];
        }
        return view('livewire.servicio.atencion.lw-create', compact('mascotas'));
    }
}
