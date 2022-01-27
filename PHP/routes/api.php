<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
// public routes
/* Category */
Route::post('/register',[AuthController::class,'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::get('/categories',[CategoryController::class,'index']);
Route::get('/categories/{id}',[CategoryController::class,'show']);
/* Product */
Route::get('/products',[ProductController::class,'index']);
Route::get('/products/{id}',[ProductController::class,'show']);
//protected route 
Route::group(['middleware' => ['auth:sanctum']],function(){
    Route::post('/categories',[CategoryController::class,'store']);
    Route::put('/categories/{id}',[CategoryController::class,'update']);
    Route::delete('/categories/{id}',[CategoryController::class,'destroy']);
});
Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
