<?php

namespace App\Http\Livewire\CompraVenta\NotaVenta;

use App\Models\NotaVenta;
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
        $nota_ventas = NotaVenta::Where('nota_ventas.monto_total', 'ILIKE', '%' . strtolower($this->attribute) . '%')
            ->orWhere('nota_ventas.created_at', 'ILIKE', '%' . strtolower($this->attribute) . '%')
            ->orWhere('nota_ventas.nombre_cliente', 'ILIKE', '%' . strtolower($this->attribute) . '%')
            ->orderBy('nota_ventas.id', 'desc')
            ->paginate(20);
        return view('livewire.compra-venta.nota-venta.lw-index', compact('nota_ventas'));
    }
}
