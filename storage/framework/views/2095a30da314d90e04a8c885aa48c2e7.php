<?php $__env->startSection('title', 'Tienda'); ?>

<?php $__env->startSection('content'); ?>
<h1 class="titulo">Nuestros paquetes para bodegas</h1>
<p class="subtitulo">Elige cuántos paquetes necesitas. Los precios son por paquete.</p>

<?php if(session('error')): ?>
    <div class="alerta"><?php echo e(session('error')); ?></div>
<?php endif; ?>


<form action="<?php echo e(route('checkout')); ?>" method="GET">
    <div class="grid-productos">
        <?php $__currentLoopData = $productos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $clave => $producto): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            
            <article class="tarjeta producto" data-producto data-precio="<?php echo e($producto['precio']); ?>">
                <div class="icono"><?php echo e($producto['icono']); ?></div>
                <h2><?php echo e($producto['nombre']); ?></h2>
                <p><?php echo e($producto['descripcion']); ?></p>
                <p class="contenido"><?php echo e($producto['contenido']); ?></p>
                <p class="precio">S/ <?php echo e(number_format($producto['precio'], 2)); ?></p>

                <div class="cantidad">
                    <button type="button" class="btn btn-chico menos" aria-label="Quitar uno">−</button>
                    <input type="number" name="cantidades[<?php echo e($clave); ?>]" value="0" min="0" max="50"
                           aria-label="Cantidad de <?php echo e($producto['nombre']); ?>">
                    <button type="button" class="btn btn-chico mas" aria-label="Agregar uno">+</button>
                </div>
            </article>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>

    <div class="tarjeta barra-total">
        <p>Total del pedido: <strong>S/ <span id="total">0.00</span></strong></p>
        <button type="submit" id="btn-comprar" class="btn btn-primario">Continuar al pedido →</button>
    </div>
</form>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
    <script src="<?php echo e(asset('js/tienda.js')); ?>"></script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /workspaces/LaravelProyecto/example-app/resources/views/shop.blade.php ENDPATH**/ ?>