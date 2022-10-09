<?php

namespace App\Http\Livewire\CompraVenta\NotaCompra;

use App\Models\NotaCompra;
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
        $nota_compras = NotaCompra::join('proveedors', 'nota_compras.proveedor_id', 'proveedors.id')
            ->select('nota_compras.*', 'proveedors.nombre as proveedor')
            ->orWhere('nota_compras.monto_total', 'ILIKE', '%' . strtolower($this->attribute) . '%')
            ->orWhere('nota_compras.created_at', 'ILIKE', '%' . strtolower($this->attribute) . '%')
            ->orWhere('proveedors.nombre', 'ILIKE', '%' . strtolower($this->attribute) . '%')
            ->orderBy('nota_compras.id', 'desc')
            ->paginate(20);
        return view('livewire.compra-venta.nota-compra.lw-index', compact('nota_compras'));
    }
}
