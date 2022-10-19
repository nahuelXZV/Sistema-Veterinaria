<?php

namespace App\Http\Livewire\CompraVenta\NotaCompra;

use App\Models\Bitacora;
use App\Models\DetalleCompra;
use App\Models\NotaCompra;
use App\Models\Producto;
use Livewire\Component;

class LwEdit extends Component
{
    public $header = [];
    public $body = [];
    public $producto = [];
    public $lista_productos = [];
    public $lista_productos_id = [];
    public $nota_compra;

    public function mount($nota_compra)
    {
        $this->nota_compra = NotaCompra::find($nota_compra->id);
        $this->header['monto_total'] = $this->nota_compra->monto_total;
        $this->header['otros'] = $this->nota_compra->otros;
        // convertir a array los productos de la nota de compra
        foreach ($this->nota_compra->detalle_nota_compras as $key => $value) {
            array_push($this->lista_productos, [
                'id_detalle' => $value->id,
                'id' => $value->producto->id,
                'nombre' => $value->producto->nombre,
                'cantidad' => $value->cantidad,
                'precio' => $value->precio,
            ]);
            array_push($this->lista_productos_id, $value->producto->id);
        }
    }

    public function save()
    {
        //crear el header
        $this->nota_compra->update($this->header);
        Bitacora::Bitacora('U', 'Nota de Compra', $this->nota_compra->id);

        //Eliminar los detalles anteriores
        $detallesAnteriores = $this->nota_compra->detalle_nota_compras;
        foreach ($detallesAnteriores as $key => $value) {
            $prod = Producto::find($value->producto->id);
            $prod->cantidad = $prod->cantidad - $value->cantidad;
            $prod->save();
            $value->delete();
        }

        //Crear los nuevos detalles
        foreach ($this->lista_productos as $key => $value) {
            DetalleCompra::create([
                'nota_compra_id' => $this->nota_compra->id,
                'producto_id' => $value['id'],
                'cantidad' => $value['cantidad'],
                'precio' => $value['precio'],
            ]);
            // aumentando el stock
            $prod = Producto::find($value['id']);
            $prod->cantidad = $prod->cantidad + $value['cantidad'];
            $prod->precio = ($prod->precio + $value['precio']) / 2;
            $prod->save();
        }
        return redirect()->route('nota_compra.index');
    }

    public function delLista($id)
    {
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
        $prod = Producto::find($this->producto['producto_id']);
        array_push($this->lista_productos, [
            'id' => $this->producto['producto_id'],
            'nombre' => $prod->nombre,
            'cantidad' => $this->producto['cantidad'],
            'precio' => $this->producto['precio'],
        ]);
        array_push($this->lista_productos_id, $prod->id);
        $this->producto = [];
        $this->getTotal();
    }

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
        return view('livewire.compra-venta.nota-compra.lw-edit', compact('productos'));
    }
}
