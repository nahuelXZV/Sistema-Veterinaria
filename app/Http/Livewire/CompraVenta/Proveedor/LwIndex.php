<?php

namespace App\Http\Livewire\CompraVenta\Proveedor;

use App\Models\Proveedor;
use Livewire\Component;
use Livewire\WithPagination;

class LwIndex extends Component
{
    use WithPagination;
    public $attribute = '';

    //Metodo de reinicio de buscador
    public function updatingAttribute()
    {
        $this->resetPage();
    }
    public function render()
    {
        $proveedores = Proveedor::where('nombre', 'ILIKE', '%' . strtolower($this->attribute) . '%')
            ->orWhere('tipo', 'ILIKE', '%' . strtolower($this->attribute) . '%')
            ->orWhere('correo', 'ILIKE', '%' . strtolower($this->attribute) . '%')
            ->orWhere('direccion', 'ILIKE', '%' . strtolower($this->attribute) . '%')
            ->orWhere('encargado', 'ILIKE', '%' . strtolower($this->attribute) . '%')
            ->orWhere('tipo', 'ILIKE', '%' . strtolower($this->attribute) . '%')
            ->orWhere('telefono', 'ILIKE', '%' . strtolower($this->attribute) . '%')
            ->orderBy('id', 'desc')
            ->paginate(20);
        return view('livewire.compra-venta.proveedor.lw-index', compact('proveedores'));
    }
}
