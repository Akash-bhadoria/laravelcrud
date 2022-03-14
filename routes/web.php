<?php

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

Route::get('/', [ProductController::class, 'index']);

Route::get('/todo', [ProductController::class, 'todo']);

Route::post('add-new-product', [ProductController::class, 'addProduct']);
Route::get('fetch-all-product', [ProductController::class, 'fetchProducts']);
Route::post('get-product', [ProductController::class, 'getProduct']);
Route::post('add-edit-product', [ProductController::class, 'editProduct']);
Route::post('delete-product', [ProductController::class, 'deleteProduct']);
