<?php

// Catálogo de la tienda. Se lee con config('productos') en cualquier parte
return [
    'snacks' => [
        'nombre'      => 'Paquete de Snacks',
        'descripcion' => 'Caja surtida para la vitrina: papas fritas, chizitos, galletas y chocolates.',
        'contenido'   => '48 unidades surtidas',
        'precio'      => 85.00,
        'icono'       => '🍿',
    ],
    'viveres' => [
        'nombre'      => 'Paquete de Víveres',
        'descripcion' => 'Abarrotes básicos para tu bodega: arroz, azúcar, fideos, aceite y menestras.',
        'contenido'   => 'Pack surtido de abarrotes',
        'precio'      => 120.00,
        'icono'       => '🥫',
    ],
    'gaseosas' => [
        'nombre'      => 'Paquete de Gaseosas',
        'descripcion' => 'Gaseosas variadas en presentación personal y familiar.',
        'contenido'   => '12 botellas surtidas',
        'precio'      => 65.00,
        'icono'       => '🥤',
    ],
];