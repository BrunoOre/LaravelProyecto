<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OrderController;

// Ruta principal (Inicio)
Route::get('/', [OrderController::class, 'home'])->name('home');

// Ruta de la tienda
Route::get('/tienda', [OrderController::class, 'shop'])->name('shop');

// Ruta de agradecimiento / contacto
Route::get('/gracias', [OrderController::class, 'thanks'])->name('thanks');

// Proceso de compra
Route::get('/checkout', [OrderController::class, 'checkout'])->name('checkout');
Route::post('/checkout', [OrderController::class, 'store'])->name('checkout.store');
Route::get('/confirmacion/{order}', [OrderController::class, 'confirmation'])->name('confirmation');