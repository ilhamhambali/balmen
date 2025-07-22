<?php

use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DashboardController; // PERUBAHAN: Tambahkan ini
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

Route::get('/', [HomeController::class, 'index'])->name('home');

// PERUBAHAN: Arahkan rute dashboard ke DashboardController
Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware(['auth', 'verified'])->name('dashboard');

// Grup untuk semua rute di dalam folder admin
Route::middleware(['auth', 'verified'])->prefix('admin')->name('admin.')->group(function () {
    // ... rute admin lainnya
    Route::get('/order', function () {
        return view('admin.order.order');
    })->name('order');

    Route::prefix('products')->name('products.')->group(function () {
        Route::get('/', [ProductController::class, 'index'])->name('index');
        Route::get('/create', [ProductController::class, 'create'])->name('create');
        Route::post('/', [ProductController::class, 'store'])->name('store');
        Route::get('/{product}/edit', [ProductController::class, 'edit'])->name('edit');
        Route::patch('/{product}', [ProductController::class, 'update'])->name('update');
        Route::delete('/{product}', [ProductController::class, 'destroy'])->name('destroy');
        Route::delete('/images/{image}', [ProductController::class, 'destroyImage'])->name('images.destroy');
    });

    Route::resource('categories', CategoryController::class);
    Route::resource('brands', BrandController::class);
});


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';


/*
|--------------------------------------------------------------------------
| Rute Panel Admin (Balmen Manage)
|--------------------------------------------------------------------------
|
| Semua rute di sini dilindungi dan hanya untuk admin.
| URL akan diawali dengan /balmen-manage.
|
*/

// Route::prefix('balmen-manage')->name('admin.')->group(function () {

//     // Rute redirect untuk URL root panel admin
//     Route::get('/', function () {
//         return redirect()->route('admin.login');
//     });
//     // Rute autentikasi (login, logout, dll.) akan berada di sini.
//     // URL-nya menjadi /balmen-manage/login, dll.
//     require __DIR__.'/auth.php';

//     // Rute yang hanya bisa diakses setelah admin login.
//     Route::middleware(['auth', 'verified'])->group(function () {
//         // Dashboard Admin
//         Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

//         // CRUD untuk Produk
//         Route::resource('products', ProductController::class);

//         // CRUD untuk Kategori
//         Route::resource('categories', CategoryController::class)->except(['show']);

//         // Rute untuk profil admin itu sendiri (jika diperlukan)
//         Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//         Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//         Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
//     });
// });


// /*
// |--------------------------------------------------------------------------
// | Rute Dashboard Pengguna Biasa (Pelanggan)
// |--------------------------------------------------------------------------
// |
// | Rute ini untuk pelanggan yang sudah login untuk melihat
// | riwayat pesanan, profil, dll.
// |
// */
// Route::middleware(['auth', 'verified'])->group(function () {
//     // Dashboard Pelanggan
//     Route::get('/dashboard', function () {
//         // Nanti kita bisa arahkan ke controller khusus pelanggan
//         return view('dashboard');
//     })->name('dashboard');

//     // Profil Pelanggan
//     // Kita bisa menggunakan ProfileController yang sama atau membuat yang baru
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });

