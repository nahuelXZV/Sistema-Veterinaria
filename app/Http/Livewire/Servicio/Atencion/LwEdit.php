<?php

namespace App\Http\Livewire\Servicio\Atencion;

use App\Models\Atencion;
use App\Models\Bitacora;
use App\Models\Tratamiento;
use Livewire\Component;

class LwEdit extends Component
{
    public $atencion;
    public $datos = [];

    public function mount($id)
    {
        $this->atencion = Atencion::find($id);
        $this->datos['anamnesis'] = $this->atencion->anamnesis;
        $this->datos['peso'] = $this->atencion->peso;
        $this->datos['temperatura'] = $this->atencion->temperatura;
        $this->datos['frecuencia_cardiaca'] = $this->atencion->frecuencia_cardiaca;
        $this->datos['frecuencia_respiratoria'] = $this->atencion->frecuencia_respiratoria;
        $this->datos['observaciones'] = $this->atencion->observaciones;
        $this->datos['indicaciones'] = $this->atencion->indicaciones;
    }

    public function save()
    {
        $this->validate([
            'datos.peso' => 'required|numeric',
            'datos.temperatura' => 'required|numeric',
            'datos.frecuencia_cardiaca' => 'required|numeric',
            'datos.frecuencia_respiratoria' => 'required|numeric',
        ], [
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

        $this->atencion->update($this->datos);
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
            $tratamiento = Tratamiento::where('atencion_id', $this->atencion->id)->first();
            if ($tratamiento) {
                $tratamiento->update($this->datos);
            } else {
                Tratamiento::create([
                    'atencion_id' => $this->atencion->id,
                    'observaciones' => $this->datos['observaciones'],
                    'indicaciones' => $this->datos['indicaciones'],
                ]);
            }
        }
        Bitacora::Bitacora('U', 'Atencion', $this->atencion->id);
        return redirect()->route('atencion.show', $this->atencion->id);
    }

    public function render()
    {
        return view('livewire.servicio.atencion.lw-edit');
    }
}
