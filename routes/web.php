<?php

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [\App\Http\Controllers\DashboardController::class, 'index'])->name('dashboard');

Auth::routes(['register' => false]);

Route::get('/product/{id}/gallery', [\App\Http\Controllers\ProductController::class, 'gallery'])->name('product.gallery');
Route::resource('product', \App\Http\Controllers\ProductController::class);
Route::resource('product-gallery', \App\Http\Controllers\ProductGalleryController::class);
Route::resource('transaction', \App\Http\Controllers\TransactionController::class);

