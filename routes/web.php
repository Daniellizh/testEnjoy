<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('dashboard', [App\Http\Controllers\ProductController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard')->middleware('can:show products');

    Route::get('add-new-product', [App\Http\Controllers\ProductController::class, 'create'])->name('add-new-product')->middleware('can:add products');
    Route::post('store-product', [App\Http\Controllers\ProductController::class, 'store'])->name('store-product')->middleware('can:add products');
    Route::get('edit-product/{id}', [App\Http\Controllers\ProductController::class, 'edit'])->name('edit-product')->middleware('can:edit products');
    Route::post('edit-product/{id}', [App\Http\Controllers\ProductController::class, 'update'])->name('update-product')->middleware('can:edit products');
    Route::delete('delete-produtc/{id}', [App\Http\Controllers\ProductController::class, 'destroy'])->name('delete-product')->middleware('can:delete products');

    Route::get('add-new-category', [App\Http\Controllers\CategoryController::class, 'create'])->name('add-new-category')->middleware('can:add categories');
    Route::post('store-category', [App\Http\Controllers\CategoryController::class, 'store'])->name('store-category')->middleware('can:add categories');
    Route::get('edit-category/{id}', [App\Http\Controllers\CategoryController::class, 'edit'])->name('edit-category')->middleware('can:edit categories');
    Route::post('edit-category/{id}', [App\Http\Controllers\CategoryController::class, 'update'])->name('update-category')->middleware('can:edit categories');
    Route::delete('delete-category/{id}', [App\Http\Controllers\CategoryController::class, 'destroy'])->name('delete-category')->middleware('can:delete categories');

    Route::resource('roles', RoleController::class)->middleware('role:super-user');
    Route::resource('users', UserController::class)->middleware('role:super-user');

    Route::get('/cart/index', [CartController::class, 'show'])->name('cart.index');
    Route::post('/cart/add/{productId}', [CartController::class, 'addToCart'])->name('cart.add-to-cart');
    Route::post('/cart/order', [CartController::class, 'placeOrder'])->name('cart.place-order');
    Route::delete('delete-cart/{id}', [CartController::class, 'destroyCart'])->name('cart.cart-delete');
});

require __DIR__.'/auth.php';
