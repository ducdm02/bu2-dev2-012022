<?php

use App\Http\Controllers\admin;
use App\Http\Controllers\CategoryController;
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

Route::get('/', function () {
    $products=products::join('categories','products.category_id','=','categories.category_id')
        ->join('producers','products.producer_id','=','producers.producer_id')
        ->paginate(6);
    return view('welcome',compact('products'));
});
Route::get('/admin', [admin::class, 'dashboard']);

/* Category */
Route::get('/category', [CategoryController::class, 'index']);
Route::post('/add-category', [CategoryController::class, 'store']);
Route::post('/update-category/{category_id}', [CategoryController::class, 'update']);
Route::get('/delete-category/{category_id}', [CategoryController::class, 'destroy']);
/* Product */
Route::get('/products', [ProductsController::class, 'index']);
Route::get('/delete-product/{product_id}', [ProductsController::class, 'destroy']);