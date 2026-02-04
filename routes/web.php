<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\PublicController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\OrderController as AdminOrderController;
use App\Http\Controllers\OrderController;

/*
|--------------------------------------------------------------------------
| PUBLIC
|--------------------------------------------------------------------------
*/
Route::get('/', [PublicController::class, 'home'])->name('home');
Route::get('/katalog', [PublicController::class, 'catalog'])->name('catalog');
Route::get('/tentang', [PublicController::class, 'about'])->name('about');
Route::get('/kontak', [PublicController::class, 'contact'])->name('contact');
Route::get('/produk/{id}', [PublicController::class, 'detail'])->name('product.detail');

/*
|--------------------------------------------------------------------------
| ORDER (CUSTOMER)
|--------------------------------------------------------------------------
*/
Route::get('/order/{id}', [OrderController::class, 'create'])->name('order.create');
Route::post('/order', [OrderController::class, 'store'])->name('order.store');
Route::get('/order/{id}/payment', [OrderController::class, 'payment'])->name('order.payment');

/*
|--------------------------------------------------------------------------
| AUTH
|--------------------------------------------------------------------------
*/
Route::get('/admin/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/admin/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

/*
|--------------------------------------------------------------------------
| ADMIN
|--------------------------------------------------------------------------
*/
Route::middleware(['auth','admin'])
->prefix('admin')
->name('admin.')
->group(function () {

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::resource('categories', CategoryController::class);
    Route::resource('products', ProductController::class);

    Route::get('/orders', [AdminOrderController::class, 'index'])->name('orders.index');
    Route::get('/orders/{id}', [AdminOrderController::class, 'show'])->name('orders.show');

    Route::put('/orders/{id}/paid', [AdminOrderController::class, 'markPaid'])
        ->name('orders.paid');

    Route::get('/settings', [SettingController::class, 'index'])->name('settings.index');
    Route::put('/settings', [SettingController::class, 'update'])->name('settings.update');
});


