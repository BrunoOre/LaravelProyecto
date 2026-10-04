<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SurtiBodega | Inicio</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="<?php echo e(asset('css/style.css')); ?>">
</head>
<body class="home">

    <section class="bienvenida">
        <h1>Surti<span>Bodega</span></h1>
        <p>Todo lo que tu bodega necesita, directo a tu puerta.</p>
    </section>

    <div class="selector">
        <div class="knob" title="Abrir menú"></div>
        <ul>
            <li style="--i:0;">
                <input type="radio" name="option" id="opt1" data-url="<?php echo e(route('home')); ?>" checked>
                <label for="opt1" title="Inicio"><i class="fa-solid fa-house"></i></label>
            </li>
            <li style="--i:1;">
                <input type="radio" name="option" id="opt2" data-url="<?php echo e(route('shop')); ?>">
                <label for="opt2" title="Tienda"><i class="fa-solid fa-cart-shopping"></i></label>
            </li>
            <li style="--i:2;">
                <input type="radio" name="option" id="opt3" data-url="<?php echo e(route('thanks')); ?>">
                <label for="opt3" title="Gracias por visitar"><i class="fa-solid fa-file-lines"></i></label>
            </li>
        </ul>
    </div>

    <p class="pista">Toca el botón central para abrir el menú</p>

    <script src="<?php echo e(asset('js/menu.js')); ?>"></script>
</body>
</html><?php /**PATH /workspaces/LaravelProyecto/example-app/resources/views/home.blade.php ENDPATH**/ ?>