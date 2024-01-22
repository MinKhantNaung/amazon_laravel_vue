<?php

use App\Http\Controllers\AddressController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

// Route::get('/', function () {
//     return Inertia::render('Welcome', [
//         'canLogin' => Route::has('login'),
//         'canRegister' => Route::has('register'),
//         'laravelVersion' => Application::VERSION,
//         'phpVersion' => PHP_VERSION,
//     ]);
// });

Route::get('/', function () {
    return Inertia::render('Dashboard');
})->name('dashboard');
Route::get('/cart', function () {
    return Inertia::render('Cart');
})->name('cart.index');
Route::get('/categories/{id}', [CategoryController::class, 'index'])->name('categories.index');
Route::get('/products/{id}', [ProductController::class, 'index'])->name('products.index');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/address', [AddressController::class, 'index'])->name('address.index');
    Route::get('/address/add', [AddressController::class, 'add'])->name('address.add');
    Route::post('/address/store', [AddressController::class, 'store'])->name('address.store');
    Route::delete('/address/{id}', [AddressController::class, 'destroy'])->name('address.destroy');

    Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout.index');
    Route::post('/checkout', [CheckoutController::class, 'store'])->name('checkout.store');
    Route::put('/checkout', [CheckoutController::class, 'update'])->name('checkout.update');
});

require __DIR__ . '/auth.php';
