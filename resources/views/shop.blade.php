@extends('layouts.app')

@section('title', 'Tienda')

@section('content')
<h1 class="titulo">Nuestros paquetes para bodegas</h1>
<p class="subtitulo">Elige cuántos paquetes necesitas. Los precios son por paquete.</p>

@if (session('error'))
    <div class="alerta">{{ session('error') }}</div>
@endif

{{-- GET: las cantidades viajan por la URL hacia el checkout --}}
<form action="{{ route('checkout') }}" method="GET">
    <div class="grid-productos">
        @foreach ($productos as $clave => $producto)
            {{-- data-precio lo lee tienda.js para calcular el total --}}
            <article class="tarjeta producto" data-producto data-precio="{{ $producto['precio'] }}">
                <div class="icono">{{ $producto['icono'] }}</div>
                <h2>{{ $producto['nombre'] }}</h2>
                <p>{{ $producto['descripcion'] }}</p>
                <p class="contenido">{{ $producto['contenido'] }}</p>
                <p class="precio">S/ {{ number_format($producto['precio'], 2) }}</p>

                <div class="cantidad">
                    <button type="button" class="btn btn-chico menos" aria-label="Quitar uno">−</button>
                    <input type="number" name="cantidades[{{ $clave }}]" value="0" min="0" max="50"
                           aria-label="Cantidad de {{ $producto['nombre'] }}">
                    <button type="button" class="btn btn-chico mas" aria-label="Agregar uno">+</button>
                </div>
            </article>
        @endforeach
    </div>

    <div class="tarjeta barra-total">
        <p>Total del pedido: <strong>S/ <span id="total">0.00</span></strong></p>
        <button type="submit" id="btn-comprar" class="btn btn-primario">Continuar al pedido →</button>
    </div>
</form>
@endsection

@push('scripts')
    <script src="{{ asset('js/tienda.js') }}"></script>
@endpush