<?php $__env->startSection('title', 'Gracias por visitarnos'); ?>

<?php $__env->startSection('content'); ?>
<div class="tarjeta centrado gracias">
    <div class="gracias-icono">🙌</div>
    <h1 class="titulo">¡Gracias por visitarnos!</h1>
    <p class="subtitulo">Esperamos abastecer tu bodega muy pronto.</p>
    <a href="<?php echo e(route('home')); ?>" class="btn btn-primario">Volver al inicio</a>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /workspaces/LaravelProyecto/example-app/resources/views/thanks.blade.php ENDPATH**/ ?>