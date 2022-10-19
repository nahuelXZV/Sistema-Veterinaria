<?php

namespace App\Http\Livewire\CompraVenta\Producto;

use App\Models\Producto;
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
        $productos = Producto::where('nombre', 'ILIKE', '%' . strtolower($this->attribute) . '%')
            ->orWhere('tipo', 'ILIKE', '%' . strtolower($this->attribute) . '%')
            ->orWhere('precio', 'ILIKE', '%' . strtolower($this->attribute) . '%')
            ->orderBy('id', 'desc')
            ->paginate(20);
        return view('livewire.compra-venta.producto.lw-index', compact('productos'));
    }
}
