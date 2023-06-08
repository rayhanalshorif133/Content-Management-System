<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Auth;
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

// admin routes
Route::name('admin.')
    ->prefix('admin')
    ->group(function () {
        Route::get('/', [AuthController::class, 'showLoginForm'])->name('login');
        Route::post('/submit', [AuthController::class, 'loginFormSubmit'])->name('login.submit');
        Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

        // dashboard
        Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');
    });

// Category
Route::name('category.')
    ->prefix('category')
    ->group(function () {
        Route::get('/', [CategoryController::class, 'index'])->name('index');
        Route::get('/fetch-details/{id}', [CategoryController::class, 'fetchDetails'])->name('fetch-details');
        Route::post('/create', [CategoryController::class, 'create'])->name('create');
        Route::get('/edit/{id}', [CategoryController::class, 'edit'])->name('edit');
        Route::post('/update/{category}', [CategoryController::class, 'update'])->name('update');
        Route::delete('/delete/{baseOn}/{id}', [CategoryController::class, 'delete'])->name('delete');
    });
