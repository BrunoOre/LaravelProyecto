@extends('layouts.app')

@section('title', 'Datos de la bodega')

@section('content')
<h1 class="titulo">Datos de tu bodega</h1>
<p class="subtitulo">Completa los datos para coordinar la entrega de tu pedido.</p>

<div class="dos-columnas">
    <form action="{{ route('checkout.store') }}" method="POST" class="tarjeta">
        @csrf

        {{-- Reenviamos las cantidades elegidas en la tienda --}}
        @foreach ($detalle as $item)
            <input type="hidden" name="cantidades[{{ $item['clave'] }}]" value="{{ $item['cantidad'] }}">
        @endforeach

        <div class="campo">
            <label for="bodega">Nombre de la bodega</label>
            <input type="text" id="bodega" name="bodega" value="{{ old('bodega') }}"
                   class="@error('bodega') invalido @enderror">
            @error('bodega') <span class="error-texto">{{ $message }}</span> @enderror
        </div>

        <div class="campo">
            <label for="cliente">Nombre del encargado</label>
            <input type="text" id="cliente" name="cliente" value="{{ old('cliente') }}"
                   class="@error('cliente') invalido @enderror">
            @error('cliente') <span class="error-texto">{{ $message }}</span> @enderror
        </div>

        <div class="campo">
            <label for="email">Correo electrónico</label>
            <input type="email" id="email" name="email" value="{{ old('email') }}"
                   class="@error('email') invalido @enderror">
            @error('email') <span class="error-texto">{{ $message }}</span> @enderror
        </div>

        <div class="campo">
            <label for="telefono">Teléfono de contacto</label>
            <input type="text" id="telefono" name="telefono" value="{{ old('telefono') }}"
                   class="@error('telefono') invalido @enderror">
            @error('telefono') <span class="error-texto">{{ $message }}</span> @enderror
        </div>

        <div class="campo">
            <label for="direccion">Dirección de entrega</label>
            <input type="text" id="direccion" name="direccion" value="{{ old('direccion') }}"
                   class="@error('direccion') invalido @enderror">
            @error('direccion') <span class="error-texto">{{ $message }}</span> @enderror
        </div>

        <div class="campo">
            <span class="etiqueta">Método de pago (simulado)</span>
            @foreach (\App\Models\Order::METODOS as $clave => $texto)
                <div class="opcion-pago">
                    <input type="radio" name="metodo_pago" id="pago_{{ $clave }}"
                           value="{{ $clave }}" @checked(old('metodo_pago') === $clave)>
                    <label for="pago_{{ $clave }}">{{ $texto }}</label>
                </div>
            @endforeach
            @error('metodo_pago') <span class="error-texto">{{ $message }}</span> @enderror
        </div>

        <button type="submit" class="btn btn-primario">Confirmar pedido</button>
    </form>

    <aside class="tarjeta">
        <h2>Resumen del pedido</h2>
        @foreach ($detalle as $item)
            <div class="fila">
                <span>{{ $item['cantidad'] }} × {{ $item['producto'] }}</span>
                <span>S/ {{ number_format($item['subtotal'], 2) }}</span>
            </div>
        @endforeach
        <div class="fila total">
            <span>Total a pagar</span>
            <span>S/ {{ number_format($total, 2) }}</span>
        </div>
        <a href="{{ route('shop') }}" class="btn btn-chico">← Cambiar pedido</a>
    </aside>
</div>
@endsection