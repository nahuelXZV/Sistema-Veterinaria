<?php

namespace App\Http\Livewire\CompraVenta\NotaVenta;

use App\Models\Bitacora;
use App\Models\DetalleVenta;
use App\Models\NotaCompra;
use App\Models\NotaVenta;
use App\Models\Producto;
use Livewire\Component;

class LwEdit extends Component
{
    public $header = [];
    public $body = [];
    public $producto = [];
    public $lista_productos = [];
    public $lista_productos_id = [];
    public $nota_venta;

    public function mount($nota_venta)
    {
        $this->nota_venta = NotaVenta::find($nota_venta->id);
        $this->header['monto_total'] = $this->nota_venta->monto_total;
        $this->header['otros'] = $this->nota_venta->otros;
        $this->header['nombre_cliente'] = $this->nota_venta->nombre_cliente;
        // convertir a array los productos de la nota de compra
        foreach ($this->nota_venta->detalle_nota_ventas as $key => $value) {
            array_push($this->lista_productos, [
                'id_detalle' => $value->id,
                'id' => $value->producto->id,
                'nombre' => $value->producto->nombre,
                'cantidad' => $value->cantidad,
                'precio' => $value->precio,
            ]);
            array_push($this->lista_productos_id, $value->producto->id);
        }
        $this->producto['producto_id'] = null;
        $this->producto['max_cantidad'] = 0;
    }

    public function save()
    {
        $this->validate([
            'header.nombre_cliente' => 'required',
            'header.monto_total' => 'required',
        ], [
            'header.nombre_cliente.required' => 'El campo nombre del cliente es obligatorio',
            'header.monto_total.required' => 'El campo Monto Total es obligatorio',
        ]);

        //crear el header
        $this->nota_venta->update($this->header);
        Bitacora::Bitacora('U', 'Nota de Venta', $this->nota_venta->id);

        // eliminar los detalles anteriores
        foreach ($this->nota_venta->detalle_nota_ventas as $key => $value) {
            $prod = Producto::find($value->producto_id);
            $prod->cantidad = $prod->cantidad + $value->cantidad;
            $prod->save();
            $value->delete();
        }

        //crear los nuevos detalle
        foreach ($this->lista_productos as $key => $value) {
            DetalleVenta::create([
                'nota_venta_id' => $this->nota_venta->id,
                'producto_id' => $value['id'],
                'cantidad' => $value['cantidad'],
                'precio' => $value['precio'],
            ]);
            // disminuyendo el stock
            $prod = Producto::find($value['id']);
            $prod->cantidad = $prod->cantidad - $value['cantidad'];
            $prod->save();
        }
        return redirect()->route('nota_venta.index');
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
            'producto.cantidad' => 'required|max:' . $this->producto['max_cantidad'],
            'producto.precio' => 'required',
        ], [
            'producto.producto_id.required' => 'El campo producto es obligatorio',
            'producto.cantidad.required' => 'El campo cantidad es obligatorio',
            'producto.cantidad.max' => 'La cantidad no puede ser mayor a ' . $this->producto['max_cantidad'],
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
        $this->producto['producto_id'] = null;
        $this->producto['max_cantidad'] = null;
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
        if ($this->producto['producto_id'] != null) {
            $prod = Producto::find($this->producto['producto_id']);
            $this->producto['precio'] = $prod->precio;
            $this->producto['max_cantidad'] = $prod->cantidad;
        }
        $productos = Producto::whereNotIn('id', $this->lista_productos_id)
            ->where('cantidad', '>', 0)
            ->get();
        return view('livewire.compra-venta.nota-venta.lw-edit', compact('productos'));
    }
}
