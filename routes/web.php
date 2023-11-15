<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\OrderController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['guest'])->group(function () {
    Route::get('login', [HomeController::class, 'login'])->name('login');
    Route::post('login', [UserController::class, 'auth']);
    
    Route::get('register', [HomeController::class, 'register']);
    Route::post('register', [UserController::class, 'store']);
});

Route::middleware(['auth'])->group(function () {

    Route::get('dashboard', [HomeController::class, 'main']);
    Route::get('form', [HomeController::class, 'form']);
    
    Route::get('user', [HomeController::class, 'user']);

    Route::post('order', [OrderController::class, 'store']);
    Route::delete('order/{id}', [OrderController::class, 'destroy']);

    
    Route::put('update/{id}', [UserController::class, 'update']);
    Route::get('logout', [UserController::class, 'logout']);
});