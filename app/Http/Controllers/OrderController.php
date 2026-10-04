<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    // Página principal: menú circular
    public function home()
    {
        return view('home');
    }

    // Tienda: muestra los 3 paquetes
    public function shop()
    {
        return view('shop', ['productos' => config('productos')]);
    }

    // Página de agradecimiento / contacto
    public function thanks()
    {
        return view('thanks');
    }

    // Checkout: recibe las cantidades y muestra resumen + formulario
    public function checkout(Request $request)
    {
        $request->validate([
            'cantidades'   => 'required|array',
            'cantidades.*' => 'nullable|integer|min:0|max:50',
        ]);

        [$detalle, $total] = $this->armarDetalle($request->input('cantidades'));

        // Si no eligió nada, lo devolvemos a la tienda
        if (empty($detalle)) {
            return redirect()->route('shop')
                ->with('error', 'Elige al menos un paquete para continuar.');
        }

        return view('checkout', compact('detalle', 'total'));
    }

    // Guarda el pedido (el pago es solo simulado)
    public function store(Request $request)
    {
        $datos = $request->validate([
            'bodega'       => 'required|string|max:100',
            'cliente'      => 'required|string|max:100',
            'email'        => 'required|email|max:100',
            'telefono'     => ['required', 'regex:/^[0-9+\s-]{7,15}$/'],
            'direccion'    => 'required|string|max:255',
            'metodo_pago'  => 'required|in:' . implode(',', array_keys(Order::METODOS)),
            'cantidades'   => 'required|array',
            'cantidades.*' => 'nullable|integer|min:0|max:50',
        ]);

        // Los precios se recalculan en el servidor
        [$detalle, $total] = $this->armarDetalle($datos['cantidades']);

        if (empty($detalle)) {
            return redirect()->route('shop')
                ->with('error', 'Elige al menos un paquete para continuar.');
        }

        $order = Order::create([
            'bodega'      => $datos['bodega'],
            'cliente'     => $datos['cliente'],
            'email'       => $datos['email'],
            'telefono'    => $datos['telefono'],
            'direccion'   => $datos['direccion'],
            'detalle'     => $detalle,
            'total'       => $total,
            'metodo_pago' => $datos['metodo_pago'],
        ]);

        return redirect()->route('confirmation', $order);
    }

    // Boleta
    public function confirmation(Order $order)
    {
        return view('confirmation', compact('order'));
    }

    // Recorre el catálogo y arma el detalle y el total.
    private function armarDetalle(array $cantidades): array
    {
        $detalle = [];
        $total = 0;

        foreach (config('productos') as $clave => $producto) {
            $cantidad = (int) ($cantidades[$clave] ?? 0);

            if ($cantidad > 0) {
                $subtotal = round($producto['precio'] * $cantidad, 2);

                $detalle[] = [
                    'clave'           => $clave,
                    'producto'        => $producto['nombre'],
                    'cantidad'        => $cantidad,
                    'precio_unitario' => $producto['precio'],
                    'subtotal'        => $subtotal,
                ];
                $total += $subtotal;
            }
        }

        return [$detalle, $total];
    }
}