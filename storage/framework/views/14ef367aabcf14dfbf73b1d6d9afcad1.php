<?php $__env->startSection('title', 'Pedido confirmado'); ?>

<?php $__env->startSection('content'); ?>
<div class="tarjeta boleta">
    <div class="centrado">
        <h1 class="titulo exito">¡Pedido registrado!</h1>
        <p class="subtitulo">Tu número de orden es</p>
        <p class="numero-orden"><?php echo e($order->numero_orden); ?></p>
    </div>

    <p><strong>Bodega:</strong> <?php echo e($order->bodega); ?></p>
    <p><strong>Encargado:</strong> <?php echo e($order->cliente); ?></p>
    <p><strong>Correo:</strong> <?php echo e($order->email); ?></p>
    <p><strong>Teléfono:</strong> <?php echo e($order->telefono); ?></p>
    <p><strong>Dirección de entrega:</strong> <?php echo e($order->direccion); ?></p>

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
                <?php $__currentLoopData = $order->detalle; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><?php echo e($item['producto']); ?></td>
                        <td class="derecha"><?php echo e($item['cantidad']); ?></td>
                        <td class="derecha">S/ <?php echo e(number_format($item['precio_unitario'], 2)); ?></td>
                        <td class="derecha">S/ <?php echo e(number_format($item['subtotal'], 2)); ?></td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
    </div>

    <div class="fila total">
        <span>Total pagado</span>
        <span>S/ <?php echo e(number_format($order->total, 2)); ?></span>
    </div>

    <p><strong>Método de pago:</strong> <?php echo e(\App\Models\Order::METODOS[$order->metodo_pago]); ?></p>
    <p class="subtitulo">Fecha: <?php echo e($order->created_at->format('d/m/Y H:i')); ?></p>

    <div class="acciones">
        <a href="<?php echo e(route('shop')); ?>" class="btn">Hacer otro pedido</a>
        <a href="<?php echo e(route('thanks')); ?>" class="btn btn-primario">Finalizar</a>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /workspaces/LaravelProyecto/example-app/resources/views/confirmation.blade.php ENDPATH**/ ?>