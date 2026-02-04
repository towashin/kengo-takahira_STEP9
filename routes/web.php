<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Controller Imports
|--------------------------------------------------------------------------
*/
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;

use App\Http\Controllers\Front\ProductController;
use App\Http\Controllers\Front\MyProductController;
use App\Http\Controllers\Front\ProductPurchaseController;
use App\Http\Controllers\Front\FavoriteController;
use App\Http\Controllers\Front\MyPageController;
use App\Http\Controllers\Front\ProfileController;
use App\Http\Controllers\Front\ContactController;

/*
|--------------------------------------------------------------------------
| Test
|--------------------------------------------------------------------------
*/
Route::get('/test', function () {
    return 'Laravel OK';
});

/*
|--------------------------------------------------------------------------
| Authentication
|--------------------------------------------------------------------------
*/
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);

Route::get('/register', [RegisterController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);

Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

/*
|--------------------------------------------------------------------------
| Public Products
|--------------------------------------------------------------------------
*/
Route::get('/products', [ProductController::class, 'index'])
    ->name('products.index');

Route::get('/products/{product}', [ProductController::class, 'show'])
    ->name('products.show');

/*
|--------------------------------------------------------------------------
| Authenticated Routes
|--------------------------------------------------------------------------
*/
Route::middleware('auth')->group(function () {

    /*
    |----------------------------------------------------------------------
    | Purchase
    |----------------------------------------------------------------------
    */
    Route::get('/products/{product}/purchase', [ProductPurchaseController::class, 'create'])
        ->name('products.purchase.form');

    Route::post('/products/{product}/purchase', [ProductPurchaseController::class, 'store'])
        ->name('products.purchase');

    /*
    |----------------------------------------------------------------------
    | Favorites
    |----------------------------------------------------------------------
    */
    Route::post('/favorites/toggle', [FavoriteController::class, 'toggle'])
        ->name('favorites.toggle');

    /*
    |----------------------------------------------------------------------
    | My Page
    |----------------------------------------------------------------------
    */
    Route::get('/mypage', [MyPageController::class, 'index'])
        ->name('mypage.index');

    /*
    |----------------------------------------------------------------------
    | Profile
    |----------------------------------------------------------------------
    */
    Route::get('/profile/edit', [ProfileController::class, 'edit'])
        ->name('profile.edit');

    Route::put('/profile', [ProfileController::class, 'update'])
        ->name('profile.update');

    /*
    |----------------------------------------------------------------------
    | My Products (Seller)
    |----------------------------------------------------------------------
    */
    Route::get('/my/products', [MyProductController::class, 'index'])
        ->name('my.products.index');

    Route::get('/my/products/create', [MyProductController::class, 'create'])
        ->name('my.products.create');

    Route::post('/my/products', [MyProductController::class, 'store'])
        ->name('my.products.store');

    Route::get('/my/products/{product}', [MyProductController::class, 'show'])
        ->name('my.products.show');

    Route::get('/my/products/{product}/edit', [MyProductController::class, 'edit'])
        ->name('my.products.edit');

    Route::put('/my/products/{product}', [MyProductController::class, 'update'])
        ->name('my.products.update');

    Route::delete('/my/products/{product}', [MyProductController::class, 'destroy'])
        ->name('my.products.destroy');
});

/*
|--------------------------------------------------------------------------
| Contact
|--------------------------------------------------------------------------
*/
Route::get('/contact', [ContactController::class, 'create'])
    ->name('contact.create');

Route::post('/contact', [ContactController::class, 'store'])
    ->name('contact.store');