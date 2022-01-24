<?php

use App\Http\Controllers\admin;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProducerController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductsController;
use App\Models\products;
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


Route::get('/admin', [admin::class, 'dashboard']);

/* Category */
Route::get('/category', [CategoryController::class, 'index']);
Route::post('/add-category', [CategoryController::class, 'store']);
Route::post('/update-category/{category_id}', [CategoryController::class, 'update']);
Route::get('/delete-category/{category_id}', [CategoryController::class, 'destroy']);
/* Product */
Route::get('/products', [ProductsController::class, 'index'])->name('product.index');;
Route::get('/delete-product/{product_id}', [ProductsController::class, 'destroy']);
Route::get('/', [ProductsController::class, 'ShowProduct']);
Route::get('/filter', [ProductsController::class, 'filter']);
Route::get('/product-create',[ProductsController::class, "create"]);
Route::post('/create', [ProductsController::class, "store"]);
Route::get('/product-edit/{product_id}',  [ProductsController::class,"edit"])->name('edit');
Route::put('/product-update/{product_id}',  [ProductsController::class,"update"])->name('upload');
/* Producer */
Route::get('/producer', [ProducerController::class, "index"])->name('producer.index');
Route::get('/producer-create',[ProducerController::class, "create"]);
Route::post('/producer-create', [ProducerController::class, "store"]);
Route::delete('producer-delete/{producer_id}', [ProducerController::class,"destroy"])->name('delete');
Route::get('/producer-edit/{producer_id}',  [ProducerController::class,"edit"])->name('edit');
Route::put('/producer-update/{producer_id}',  [ProducerController::class,"update"])->name('upload');

