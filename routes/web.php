<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SiteController;
use App\Http\Controllers\CartController;

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

/** Пользовательские операции если не залогинен */
Route::get('/', [SiteController::class, 'index'])->name('/');
Route::get('/catalog/{cat_id?}', [SiteController::class, 'catalog'])->name('catalog');
Route::get('/search/{q?}', [SiteController::class, 'search'])->name('search');
Route::get('/product/{product}', [SiteController::class, 'view'])->name('product');
Route::get('/checkout', [CartController::class, 'checkout'])->name('checkout');


/** Всё для авторизации */
Route::middleware('guest')->group(function () {

    Route::get('/login', [\App\Http\Controllers\AuthController::class, 'login'])
        ->name('login');
    Route::post('/login', [\App\Http\Controllers\AuthController::class, 'auth'])
        ->name('auth');

    Route::get('/sign_up', [\App\Http\Controllers\SignUpController::class, 'form'])
        ->name('signup.form');
    Route::post('/sign_up', [\App\Http\Controllers\SignUpController::class, 'sign_up'])
        ->name('signup');
    Route::post('/signup/verify', [\App\Http\Controllers\SignUpController::class, 'verify'])
        ->name('signup.verify');

    Route::get('/forgot', [\App\Http\Controllers\ForgotController::class, 'form'])->
    name('forgot.form');
    Route::post('/forgot', [\App\Http\Controllers\ForgotController::class, 'forgot'])
        ->name('forgot');
    Route::post('/forgot/verify', [\App\Http\Controllers\ForgotController::class, 'verify'])
        ->name('forgot.verify');

});

/** Пользовательские операции если залогинен */
Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::get('/logout', [\App\Http\Controllers\AuthController::class, 'logout'])
        ->name('logout');
});

/** Панель управления*/
Route::group(['middleware' => ['auth:sanctum', 'panel_user']], function (){
    Route::group(['prefix' => 'admin'], function () {
        Route::get('/', [\App\Http\Controllers\Admin\MainController::class, 'index'])
            ->name('admin');

        Route::group(['prefix' => 'products'], function () {
            Route::get('', [\App\Http\Controllers\Admin\ProductsController::class, 'index'])
                ->name('admin.products');
            Route::get('/form', [\App\Http\Controllers\Admin\ProductsController::class, 'form'])
                ->name('admin.products.form');
            Route::get('/{product}', [\App\Http\Controllers\Admin\ProductsController::class, 'view'])
                ->name('admin.product');
        });

    });


});
