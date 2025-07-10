<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DashboardController;

/*
|--------------------------------------------------------------------------
| Rute Publik / Pengguna
|--------------------------------------------------------------------------
|
| Rute ini dapat diakses oleh siapa saja.
| Ini adalah etalase toko online Anda.
|
*/
Route::get('/', [HomeController::class, 'index'])->name('home');
//Route::get('/products/{product:slug}', [HomeController::class, 'showProduct'])->name('products.show');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/products', function () {
    return view('admin.products.index');
})->middleware(['auth', 'verified'])->name('products');

Route::get('/products/create', function () {
    return view('admin.products.create');
})->middleware(['auth', 'verified'])->name('products.create');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

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

