<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

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

    Route::get('dashboard', [App\Http\Controllers\ProductController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');
    Route::get('add-new-product', [App\Http\Controllers\ProductController::class, 'create'])->name('add-new-product');
    Route::post('store-product', [App\Http\Controllers\ProductController::class, 'store'])->name('store-product');
    Route::get('edit-product/{id}', [App\Http\Controllers\ProductController::class, 'edit'])->name('edit-product');
    Route::post('edit-product/{id}', [App\Http\Controllers\ProductController::class, 'update'])->name('update-product');
    Route::delete('delete-produtc/{id}', [App\Http\Controllers\ProductController::class, 'destroy'])->name('delete-product');

    Route::get('add-new-category', [App\Http\Controllers\CategoryController::class, 'create'])->name('add-new-category');
    Route::post('store-category', [App\Http\Controllers\CategoryController::class, 'store'])->name('store-category');
    Route::get('edit-category/{id}', [App\Http\Controllers\CategoryController::class, 'edit'])->name('edit-category');
    Route::post('edit-category/{id}', [App\Http\Controllers\CategoryController::class, 'update'])->name('update-category');
    Route::delete('delete-category/{id}', [App\Http\Controllers\CategoryController::class, 'destroy'])->name('delete-category');
});

require __DIR__.'/auth.php';
