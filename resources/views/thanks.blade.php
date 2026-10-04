@extends('layouts.app')

@section('title', 'Gracias por visitarnos')

@section('content')
<div class="tarjeta centrado gracias">
    <div class="gracias-icono">🙌</div>
    <h1 class="titulo">¡Gracias por visitarnos!</h1>
    <p class="subtitulo">Esperamos abastecer tu bodega muy pronto.</p>
    <a href="{{ route('home') }}" class="btn btn-primario">Volver al inicio</a>
</div>
@endsection