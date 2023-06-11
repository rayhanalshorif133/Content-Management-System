<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ContentController;
use App\Http\Controllers\ContentOwnerController;
use App\Http\Controllers\ContentTypeController;
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
        Route::post('/create/sub-category', [CategoryController::class, 'createSubCategory'])->name('create.sub-category');
        Route::get('/edit/{id}', [CategoryController::class, 'edit'])->name('edit');
        Route::post('/update/{category}', [CategoryController::class, 'update'])->name('update');
        Route::delete('/delete/{baseOn}/{id}', [CategoryController::class, 'delete'])->name('delete');
    });

// Content
Route::name('content.')
    ->prefix('content')
    ->group(function () {
        Route::get('/', [ContentController::class, 'index'])->name('index');
        Route::get('/create', [ContentController::class, 'create'])->name('create');
        Route::get('/fetchData', [ContentController::class, 'fetchData'])->name('fetchData');
        Route::get('/{id}/view', [ContentController::class, 'view'])->name('view');
        Route::post('/store', [ContentController::class, 'store'])->name('store');
        Route::get('/{id}/edit', [ContentController::class, 'edit'])->name('edit');
        Route::post('/update', [ContentController::class, 'update'])->name('update');
        Route::delete('/delete/{id}', [ContentController::class, 'delete'])->name('delete');
    });

// Content Owner
Route::name('content-owner.')
    ->prefix('content-owner')
    ->group(function () {
        Route::get('/', [ContentOwnerController::class, 'index'])->name('index');
        Route::post('/store', [ContentOwnerController::class, 'store'])->name('store');
        Route::post('/update', [ContentOwnerController::class, 'update'])->name('update');
        Route::delete('/delete/{id}', [ContentOwnerController::class, 'delete'])->name('delete');
    });

// Content Types
Route::name('content-type.')
    ->prefix('content-type')
    ->group(function () {
        Route::get('/', [ContentTypeController::class, 'index'])->name('index');
        Route::post('/create', [ContentTypeController::class, 'create'])->name('create');
        Route::get('/{id}/fetch', [ContentTypeController::class, 'fetch'])->name('fetch');
        Route::post('/update', [ContentTypeController::class, 'update'])->name('update');
        Route::delete('/delete/{id}', [ContentTypeController::class, 'delete'])->name('delete');
    });
