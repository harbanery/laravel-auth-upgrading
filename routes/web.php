<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/products', [ProductController::class, 'index'])->name('products.index');

Route::get('/products/search', [ProductController::class, 'search'])->name('products.search');

// Route untuk menampilkan formulir tambah produk
Route::get('/products/create', [ProductController::class, 'create'])->name('products.create');

// Route untuk menyimpan produk baru
Route::post('/products', [ProductController::class, 'store'])->name('products.store');

// Route untuk menampilkan detail produk berdasarkan ID
Route::get('/products/{id}', [ProductController::class, 'show'])->name('products.show');

// Route untuk menampilkan formulir edit produk berdasarkan ID
Route::get('/products/{id}/edit', [ProductController::class, 'edit'])->name('products.edit');

// Route untuk memperbarui produk berdasarkan ID
Route::put('/products/{id}', [ProductController::class, 'update'])->name('products.update');

// Route untuk menghapus produk berdasarkan ID
Route::delete('/products/{id}', [ProductController::class, 'destroy'])->name('products.destroy');

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');
