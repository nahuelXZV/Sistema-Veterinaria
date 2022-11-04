<?php

namespace App\Http\Livewire\CompraVenta\NotaCompra;

use App\Models\Bitacora;
use App\Models\DetalleCompra;
use App\Models\NotaCompra;
use App\Models\Producto;
use App\Models\Proveedor;
use Livewire\Component;

class LwCreate extends Component
{
    public $header = [];
    public $body = [];
    public $producto = [];
    public $lista_productos = [];
    public $proveedores;
    public $lista_productos_id = [];

    public function mount()
    {
        $this->proveedores = Proveedor::all();
    }

    public function save()
    {
        $this->validate([
            'header.proveedor_id' => 'required',
            'header.monto_total' => 'required',
        ], [
            'header.proveedor_id.required' => 'El campo Proveedor es obligatorio',
            'header.monto_total.required' => 'El campo Monto Total es obligatorio',
        ]);

        //crear el header
        $nota_compra = NotaCompra::create($this->header);
        Bitacora::Bitacora('C', 'Nota de Compra', $nota_compra->id);

        //crear el detalle
        foreach ($this->lista_productos as $key => $value) {
            DetalleCompra::create([
                'nota_compra_id' => $nota_compra->id,
                'producto_id' => $value['id'],
                'cantidad' => $value['cantidad'],
                'precio' => $value['precio'],
            ]);
            // aumentando el stock
            $prod = Producto::find($value['id']);
            $prod->cantidad = $prod->cantidad + $value['cantidad'];
            $prod->save();
        }
        return redirect()->route('nota_compra.index');
    }

    public function delLista($id)
    {
        // eliminamos de la lista de productos un producto
        foreach ($this->lista_productos as $key => $producto) {
            if ($producto['id'] == $id) {
                unset($this->lista_productos[$key]);
                unset($this->lista_productos_id[$key]);
                $this->getTotal();
            }
        }
    }

    public function addProducto()
    {
        $this->validate([
            'producto.producto_id' => 'required',
            'producto.cantidad' => 'required',
            'producto.precio' => 'required',
        ], [
            'producto.producto_id.required' => 'El campo producto es obligatorio',
            'producto.cantidad.required' => 'El campo cantidad es obligatorio',
            'producto.precio.required' => 'El campo precio es obligatorio',
        ]);
        // buscamos el producto por su id
        $prod = Producto::find($this->producto['producto_id']);
        // agregamos el producto a la lista de productos
        array_push($this->lista_productos, [
            'id' => $this->producto['producto_id'],
            'nombre' => $prod->nombre,
            'cantidad' => $this->producto['cantidad'],
            'precio' => $this->producto['precio'],
        ]);
        // agregamos el id del producto a la lista de ids de productos
        array_push($this->lista_productos_id, $prod->id);
        // limpiamos el campo producto
        $this->producto = [];
        $this->getTotal();
    }

    // obtener el total de la compra
    public function getTotal()
    {
        $total = 0;
        foreach ($this->lista_productos as $producto) {
            $total += $producto['cantidad'] * $producto['precio'];
        }
        $this->header['monto_total'] = $total;
    }

    public function render()
    {
        $productos = Producto::whereNotIn('id', $this->lista_productos_id)->get();
        return view('livewire.compra-venta.nota-compra.lw-create', compact('productos'));
    }
}
