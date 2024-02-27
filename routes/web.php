<?php

use App\Http\Controllers\UserController;
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

// USER ROUTES
Route::get('/user', [UserController::class, 'main'])->name('user.main');

Route::get('/user/make',[UserController::class, 'make'])->name('user.make');

Route::post('/user', [UserController::class, 'store'])->name('user.store');

// DEV ROUTES