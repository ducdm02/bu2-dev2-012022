<?php

use App\Http\Controllers\admin;
use App\Http\Controllers\ProducerController;
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
Route::get('admin', [admin::class, 'index']);

Route::get('/producer', [ProducerController::class, "index"])->name('producer.index');
Route::get('/producer-create',[ProducerController::class, "create"]);
Route::post('/producer-create', [ProducerController::class, "store"]);
Route::delete('producer-delete/{producer_id}', [ProducerController::class,"destroy"])->name('delete');
Route::get('/producer-edit/{producer_id}',  [ProducerController::class,"edit"])->name('edit');
Route::put('/producer-update/{producer_id}',  [ProducerController::class,"update"])->name('upload');
