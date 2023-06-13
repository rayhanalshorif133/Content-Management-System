<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ContentController;
use App\Http\Controllers\ContentOwnerController;
use App\Http\Controllers\ContentTypeController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FaqController;
use App\Http\Controllers\SubscriberController;
use App\Http\Controllers\WebController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;

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

// clear routes
Route::get('clear', function () {
    Artisan::call('view:clear');
    Artisan::call('cache:clear');
    Artisan::call('route:clear');
    Artisan::call('config:clear');
    Artisan::call('optimize:clear');
    Artisan::call('config:cache');
    Artisan::call('optimize');
    Artisan::call('route:cache');
    return "Cleared!";
});

Route::get('/', [WebController::class, 'home'])->name('home');

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
Route::name('admin.category.')
    ->prefix('admin/category')
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






// Web Routes
Route::get('content/details/{id}', [WebController::class, 'contentDetails'])->name('content.details');
// subscriber
Route::name('category.')
    ->prefix('category/')
    ->group(
        function () {
            Route::get('/', [WebController::class, 'categoryIndex'])->name('index');
            Route::get('/{id}', [WebController::class, 'categoryDetails'])->name('details');
        }
    );
Route::get('faq', [WebController::class, 'faq_index'])->name('faq.index');
Route::get('help', [WebController::class, 'help'])->name('help.index');
Route::get('terms-condition', [WebController::class, 'terms_condition'])->name('terms-condition.index');

// subscriber
Route::name('subscriber.')
    ->prefix('subscriber/')
    ->group(function () {
        Route::get('confirmation', [SubscriberController::class, 'subscriberConfirmation'])->name('confirmation');
        Route::get('confirmed', [SubscriberController::class, 'subscriberConfirmed'])->name('confirmed');
        Route::get('cancel-confirmation', [SubscriberController::class, 'subscriberCancelConfirmation'])->name('cancel-confirmation');
        Route::get('cancel-confirmed', [SubscriberController::class, 'subscriberCancelConfirmed'])->name('cancel-confirmed');
    });



