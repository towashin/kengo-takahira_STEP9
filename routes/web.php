<?php

use Illuminate\Support\Facades\Route;

Route::get('/test', function () {
    return 'Laravel OK';
});

Route::get('/products', [ProductController::class, 'index'])
    ->name('products.index');

Route::get('/mypage', [UserController::class, 'show'])
    ->middleware('auth')
    ->name('mypage.show');

Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])
    ->name('logout');

Route::get('/contact', [ContactController::class, 'create'])
    ->name('contact.create');

Route::get('/products', [ProductController::class, 'index'])
    ->name('products.index');

Route::get('/mypage', [UserController::class, 'show'])
    ->middleware('auth')
    ->name('mypage.show');

    use App\Http\Controllers\Auth\LoginController;

Route::get('/login', [LoginController::class, 'showLoginForm'])
    ->name('login');

Route::post('/login', [LoginController::class, 'login']);

Route::post('/logout', [LoginController::class, 'logout'])
    ->name('logout');

    use App\Http\Controllers\Auth\RegisterController;

Route::get('/register', [RegisterController::class, 'showRegisterForm'])
    ->name('register');

Route::post('/register', [RegisterController::class, 'register']);

    use App\Http\Controllers\Front\ProductController;

Route::get('/products', [ProductController::class, 'index'])
    ->name('products.index');

Route::get('/products/{id}', [ProductController::class, 'show'])
    ->name('products.show');

    use App\Http\Controllers\Front\FavoriteController;

Route::post('/favorites/toggle', [FavoriteController::class, 'toggle'])
    ->middleware('auth')
    ->name('favorites.toggle');

Route::post('/cart/{product}', function ($productId) {
    return redirect()->back()->with('success', 'カートに追加しました');
})->name('cart.add');

    use App\Http\Controllers\Front\ProductPurchaseController;

Route::get('/products/{product}/purchase', [ProductPurchaseController::class, 'create'])
    ->name('products.purchase.form');

Route::post('/products/{product}/purchase', [ProductPurchaseController::class, 'store'])
    ->name('products.purchase')
    ->middleware('auth');

Route::get('/products/create', [ProductController::class, 'create'])
    ->middleware('auth')
    ->name('products.create');

Route::post('/products', [ProductController::class, 'store'])
    ->middleware('auth')
    ->name('products.store');

// The following import is redundant and causes a naming conflict because ProductController is already imported earlier.
// Removed: use App\Http\Controllers\Front\ProductController;

Route::get('/my/products/{product}', [ProductController::class, 'showMyProduct'])
    ->middleware('auth')
    ->name('my.products.show');

Route::delete('/my/products/{product}', [ProductController::class, 'destroy'])
    ->middleware('auth')
    ->name('my.products.destroy');

Route::get('/my/products/{product}/edit', [ProductController::class, 'edit'])
    ->middleware('auth')
    ->name('my.products.edit');

Route::get('/my/products/{product}/edit', [ProductController::class, 'edit'])
    ->middleware('auth')
    ->name('my.products.edit');

Route::put('/my/products/{product}', [ProductController::class, 'update'])
    ->middleware('auth')
    ->name('my.products.update');

    use App\Http\Controllers\Front\ContactController;

Route::get('/contact', [ContactController::class, 'create'])
    ->name('contact.create');

Route::post('/contact', [ContactController::class, 'store'])
    ->name('contact.store');

    use App\Http\Controllers\Front\MyPageController;

Route::get('/mypage', [MyPageController::class, 'index'])
    ->middleware('auth')
    ->name('mypage.index');

    use App\Http\Controllers\Front\ProfileController;

Route::get('/profile/edit', [ProfileController::class, 'edit'])
    ->middleware('auth')
    ->name('profile.edit');

Route::put('/profile', [ProfileController::class, 'update'])
    ->middleware('auth')
    ->name('profile.update');

