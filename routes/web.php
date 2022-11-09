<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\AdminController;
use \App\Http\Controllers\CatalogController;
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
