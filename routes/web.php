<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CatalogController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ServiceController;
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

Route::get('/', [CatalogController::class, 'index']);
Route::get('/card/{id}', [CatalogController::class, 'card']);
Route::get('/add-service/{id}', [CatalogController::class, 'addService']);
Route::get('/remove-service/{id}', [CatalogController::class, 'removeService']);
Route::get('/admin', [AdminController::class, 'index']);
Route::get('/products/create', [ProductController::class, 'create'])->name('products.create');
Route::get('/services/create', [ServiceController::class, 'create'])->name('services.create');
Route::get('/product/{id}/edit', [ProductController::class, 'edit'])->name('product.edit');
Route::get('/service/{id}/edit', [ServiceController::class, 'edit'])->name('service.edit');

Route::post('/products', [ProductController::class, 'store'])->name('product.store');
Route::post('/services', [ServiceController::class, 'store'])->name('service.store');

Route::delete('/products/{id}', [ProductController::class, 'destroy'])->name('products.delete');
Route::delete('/services/{id}', [ServiceController::class, 'destroy'])->name('services.delete');

Route::put('/products/{id}', [ProductController::class, 'update'])->name('products.update');
Route::put('/services/{id}', [ServiceController::class, 'update'])->name('services.update');
