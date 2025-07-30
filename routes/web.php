<?php

use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\ContactController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// RUTE PUBLIK (Tidak Perlu Login)
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/products/search', [HomeController::class, 'search'])->name('products.search');
Route::get('/about', function () {
    return view('about');
})->name('about');
Route::get('/contact', [ContactController::class, 'create'])->name('contact');
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');

// RUTE TOKO (Publik / Guest Checkout)
Route::get('/shop', [ShopController::class, 'index'])->name('shop.index');
Route::get('/products/{product:slug}', [ShopController::class, 'productDetails'])->name('shop.products.details');
Route::post('/products/{product}/recommendations', [ShopController::class, 'getAiRecommendations'])->name('shop.products.recommendations');
Route::post('/products/get-size-recommendation', [ShopController::class, 'getSizeRecommendation'])->name('shop.products.getSizeRecommendation');
Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
Route::post('/cart/add/{product}', [CartController::class, 'store'])->name('cart.store');
Route::patch('/cart/update/{id}', [CartController::class, 'update'])->name('cart.update');
Route::delete('/cart/remove/{id}', [CartController::class, 'destroy'])->name('cart.destroy');
Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout.index');
Route::post('/checkout', [CheckoutController::class, 'placeOrder'])->name('checkout.placeOrder');
Route::get('/order-confirmation/{order}', [CheckoutController::class, 'confirmation'])->name('checkout.confirmation');


// RUTE ADMIN & USER (Wajib Login)
Route::middleware(['auth', 'verified'])->group(function () {

    // PERUBAHAN: Lindungi dasbor hanya untuk admin
    Route::get('/dashboard', [DashboardController::class, 'index'])
        ->middleware('role:admin') // Hanya admin yang bisa akses
        ->name('dashboard');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // PERUBAHAN: Lindungi semua rute admin
    Route::prefix('admin')->name('admin.')->middleware('role:admin')->group(function () {
        // ... (semua rute admin Anda seperti products, categories, brands, orders)
        Route::get('/orders', [OrderController::class, 'index'])->name('orders.index');
        Route::get('/orders/{order}', [OrderController::class, 'show'])->name('orders.show');
        Route::patch('/orders/{order}/status', [OrderController::class, 'updateStatus'])->name('orders.updateStatus');
        Route::resource('products', ProductController::class)->except(['show']);
        Route::delete('/products/images/{image}', [ProductController::class, 'destroyImage'])->name('products.images.destroy');
        Route::resource('categories', CategoryController::class);
        Route::resource('brands', BrandController::class);
    });
});

require __DIR__ . '/auth.php';
