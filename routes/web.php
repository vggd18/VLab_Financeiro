<?php

use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// APP ROUTES

Route::get('/', function () {
    return view('site.index');
});

// CATEGORY ROUTES
Route::get('/category', [CategoryController::class, 'main'])->name('category.main');

Route::get('/category/make',[CategoryController::class, 'make'])->name('category.make');

Route::post('/category', [CategoryController::class, 'store'])->name('category.store');

Route::get('category/list', [CategoryController::class, 'list'])->name('category.list');

Route::delete('/category/{id}', [CategoryController::class, 'remove'])->name('category.remove');

// DEV ROUTES