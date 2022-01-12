<?php

use App\Http\Controllers\admin;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
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

Route::get('/', function () {
    return view('welcome');
});
Route::get('/admin', [admin::class, 'dashboard']);
Route::get('/products', [ProductController::class, 'index']);
/* Category */
Route::get('/category', [CategoryController::class, 'index']);
Route::post('/add-category', [CategoryController::class, 'store']);
Route::post('/update-category/{category_id}', [CategoryController::class, 'update']);
Route::get('/delete-category/{category_id}', [CategoryController::class, 'destroy']);
/* Product */