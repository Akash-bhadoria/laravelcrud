<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

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

Route::get('/home', function () {
    return view('test');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

Route::get('/', [ProductController::class, 'index'])->name('index')->middleware('auth');

Route::get('/todo', [ProductController::class, 'todo'])->name('todo');

Route::post('add-new-product', [ProductController::class, 'addProduct'])->middleware('auth');
Route::get('fetch-all-product', [ProductController::class, 'fetchProducts'])->middleware('auth');
Route::post('get-product', [ProductController::class, 'getProduct'])->middleware('auth');
Route::post('add-edit-product', [ProductController::class, 'editProduct'])->middleware('auth');
Route::post('delete-product', [ProductController::class, 'deleteProduct'])->middleware('auth');