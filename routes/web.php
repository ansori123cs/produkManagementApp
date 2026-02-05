<?php

use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProdukController;
use App\Http\Middleware\CorsMiddleware;

Route::middleware([CorsMiddleware::class])->group(function () {
    // Dashboard
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

    // Route khusus filter HARUS didefinisikan SEBELUM resource
    Route::get('/produk/filter', [ProdukController::class, 'filter'])->name('produk.filter');

    // Resource untuk produk
    Route::resource('produk', ProdukController::class);
});
