<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SurtiBodega</title>
    <!-- FontAwesome para íconos -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <!-- Estilos CSS -->
    <link rel="stylesheet" href="<?php echo e(asset('css/style.css')); ?>">
</head>
<body>

    <header class="navbar">
        <a href="<?php echo e(route('home')); ?>" class="logo">
            <i class="fa-solid fa-store"></i> Surti<span>Bodega</span>
        </a>
        <nav>
            <a href="<?php echo e(route('home')); ?>" class="<?php echo e(request()->routeIs('home') ? 'active' : ''); ?>">
                <i class="fa-solid fa-house"></i> Inicio
            </a>
            <a href="<?php echo e(route('shop')); ?>" class="<?php echo e(request()->routeIs('shop') ? 'active' : ''); ?>">
                <i class="fa-solid fa-basket-shopping"></i> Tienda
            </a>
            <a href="<?php echo e(route('thanks')); ?>" class="<?php echo e(request()->routeIs('thanks') ? 'active' : ''); ?>">
                <i class="fa-solid fa-envelope"></i> Contacto
            </a>
        </nav>
    </header>

    <main class="contenedor">
        <?php echo $__env->yieldContent('content'); ?>
    </main>

    <?php echo $__env->yieldPushContent('scripts'); ?>
</body>
</html><?php /**PATH /workspaces/LaravelProyecto/example-app/resources/views/layouts/app.blade.php ENDPATH**/ ?>