<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    public const METODOS = [
        'tarjeta'       => 'Tarjeta de Crédito/Débito (simulada)',
        'efectivo'      => 'Efectivo contra entrega',
        'transferencia' => 'Transferencia / Yape / Plin',
    ];

    protected $fillable = [
        'bodega', 'cliente', 'email', 'telefono', 'direccion',
        'detalle', 'total', 'metodo_pago',
    ];

    // 'detalle' se guarda como JSON, pero en PHP lo usamos como arreglo
    protected $casts = [
        'detalle' => 'array',
    ];

    // Número de orden calculado: #ORD-1001, #ORD-1002...
    protected function numeroOrden(): Attribute
    {
        return Attribute::make(
            get: fn () => '#ORD-' . (1000 + $this->id)
        );
    }
}