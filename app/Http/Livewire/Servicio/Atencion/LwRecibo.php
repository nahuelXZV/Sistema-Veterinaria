<?php

namespace App\Http\Livewire\Servicio\Atencion;

use App\Models\Atencion;
use App\Models\Bitacora;
use App\Models\DetalleRecibo;
use App\Models\DetalleServicio;
use App\Models\Producto;
use App\Models\Recibo;
use App\Models\Servicio;
use Livewire\Component;

class LwRecibo extends Component
{
    public $header = [];
    public $body = [];
    public $producto = [];
    public $servicio = [];
    public $lista_productos = [];
    public $lista_productos_id = [];
    public $lista_servicios = [];
    public $lista_servicios_id = [];
    public $atencion;

    public function mount($id)
    {
        $this->atencion = Atencion::find($id);
        $this->producto['producto_id'] = null;
        $this->servicio['servicio_id'] = null;
        $this->producto['max_cantidad'] = 0;
    }

    public function save()
    {
        $this->validate([
            'header.monto_total' => 'required',
        ], [
            'header.monto_total.required' => 'El campo Monto Total es obligatorio',
        ]);

        //crear el header
        $this->header['atencion_id'] = $this->atencion->id;
        $recibo = Recibo::create($this->header);
        Bitacora::Bitacora('C', 'Recibo', $recibo->id);

        //crear el detalle
        foreach ($this->lista_productos as $key => $value) {
            DetalleRecibo::create([
                'recibo_id' => $recibo->id,
                'producto_id' => $value['id'],
                'cantidad' => $value['cantidad'],
                'precio' => $value['precio'],
            ]);
            // disminuyendo el stock
            $prod = Producto::find($value['id']);
            $prod->cantidad = $prod->cantidad - $value['cantidad'];
            $prod->save();
        }

        // crear el detalle de servicios
        foreach ($this->lista_servicios as $key => $value) {
            DetalleServicio::create([
                'recibo_id' => $recibo->id,
                'servicio_id' => $value['id'],
                'precio' => $value['precio'],
            ]);
        }
        return redirect()->route('atencion.show', $this->atencion->id);
    }

    public function delLista($id, $type = '')
    {
        // mostrar que contiene type
        if ($type == 'producto') {
            foreach ($this->lista_productos as $key => $producto) {
                if ($producto['id'] == $id) {
                    unset($this->lista_productos[$key]);
                    unset($this->lista_productos_id[$key]);
                }
            }
        } else {
            foreach ($this->lista_servicios as $key => $serv) {
                if ($serv['id'] == $id) {
                    unset($this->lista_servicios[$key]);
                    unset($this->lista_servicios_id[$key]);
                }
            }
        }
        $this->getTotal();
    }

    public function addProducto()
    {
        $this->validate([
            'producto.producto_id' => 'required',
            'producto.cantidad' => 'required|lte:' . $this->producto['max_cantidad'],
            'producto.precio' => 'required',
        ], [
            'producto.producto_id.required' => 'El campo producto es obligatorio',
            'producto.cantidad.required' => 'El campo cantidad es obligatorio',
            'producto.cantidad.lte' => 'La cantidad no puede ser mayor a ' . $this->producto['max_cantidad'],
            'producto.precio.required' => 'El campo precio es obligatorio',
        ]);
        $prod = Producto::find($this->producto['producto_id']);
        array_push($this->lista_productos, [
            'id' => $this->producto['producto_id'],
            'nombre' => $prod->nombre,
            'cantidad' => $this->producto['cantidad'],
            'precio' => $this->producto['precio'],
            'tipo' => 'producto',
        ]);
        array_push($this->lista_productos_id, $prod->id);
        $this->producto = [];
        $this->producto['producto_id'] = null;
        $this->producto['max_cantidad'] = null;
        $this->getTotal();
    }

    public function addServicio()
    {
        $this->validate([
            'servicio.servicio_id' => 'required',
            'servicio.precio' => 'required',
        ], [
            'servicio.producto_id.required' => 'El campo servicio es obligatorio',
            'servicio.precio.required' => 'El campo precio es obligatorio',
        ]);
        $prod = Servicio::find($this->servicio['servicio_id']);
        array_push($this->lista_servicios, [
            'id' => $this->servicio['servicio_id'],
            'nombre' => $prod->nombre,
            'cantidad' => 1,
            'precio' => $this->servicio['precio'],
            'tipo' => 'servicio'
        ]);
        array_push($this->lista_servicios_id, $prod->id);
        $this->servicio = [];
        $this->servicio['servicio_id'] = null;
        $this->getTotal();
    }

    public function getTotal()
    {
        $total = 0;
        foreach ($this->lista_productos as $producto) {
            $total += $producto['cantidad'] * $producto['precio'];
        }
        foreach ($this->lista_servicios as $servicio) {
            $total += $servicio['precio'];
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
        if ($this->servicio['servicio_id'] != null) {
            $serv = Servicio::find($this->servicio['servicio_id']);
            $this->servicio['precio'] = $serv->precio;
        }
        $productos = Producto::whereNotIn('id', $this->lista_productos_id)
            ->where('cantidad', '>', 0)
            ->get();
        $servicios = Servicio::all();
        // unir lista_productos y lista_servicios
        $lista = array_merge($this->lista_productos, $this->lista_servicios);
        return view('livewire.servicio.atencion.lw-recibo', compact('productos', 'servicios', 'lista'));
    }
}
