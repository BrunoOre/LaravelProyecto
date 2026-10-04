@extends('layouts.app')

@section('title', 'Pedido confirmado')

@section('content')
<div class="tarjeta boleta">
    <div class="centrado">
        <h1 class="titulo exito">¡Pedido registrado!</h1>
        <p class="subtitulo">Tu número de orden es</p>
        <p class="numero-orden">{{ $order->numero_orden }}</p>
    </div>

    <p><strong>Bodega:</strong> {{ $order->bodega }}</p>
    <p><strong>Encargado:</strong> {{ $order->cliente }}</p>
    <p><strong>Correo:</strong> {{ $order->email }}</p>
    <p><strong>Teléfono:</strong> {{ $order->telefono }}</p>
    <p><strong>Dirección de entrega:</strong> {{ $order->direccion }}</p>

    <div class="tabla-scroll">
        <table>
            <thead>
                <tr>
                    <th>Producto</th>
                    <th class="derecha">Cant.</th>
                    <th class="derecha">P. unit.</th>
                    <th class="derecha">Subtotal</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($order->detalle as $item)
                    <tr>
                        <td>{{ $item['producto'] }}</td>
                        <td class="derecha">{{ $item['cantidad'] }}</td>
                        <td class="derecha">S/ {{ number_format($item['precio_unitario'], 2) }}</td>
                        <td class="derecha">S/ {{ number_format($item['subtotal'], 2) }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="fila total">
        <span>Total pagado</span>
        <span>S/ {{ number_format($order->total, 2) }}</span>
    </div>

    <p><strong>Método de pago:</strong> {{ \App\Models\Order::METODOS[$order->metodo_pago] }}</p>
    <p class="subtitulo">Fecha: {{ $order->created_at->format('d/m/Y H:i') }}</p>

    <div class="acciones">
        <a href="{{ route('shop') }}" class="btn">Hacer otro pedido</a>
        <a href="{{ route('thanks') }}" class="btn btn-primario">Finalizar</a>
    </div>
</div>
@endsection