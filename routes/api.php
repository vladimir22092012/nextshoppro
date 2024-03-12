<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\SiteController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/catalog', [SiteController::class, 'filter'])->name('api.catalog');

Route::group(['prefix' => 'cart'], function () {
    Route::post('/addToCart', [\App\Http\Controllers\CartController::class, 'addToCard'])->name('cart.addToCart');
    Route::post('/deleteProduct', [\App\Http\Controllers\CartController::class, 'deleteProduct'])->name('cart.deleteProduct');
});

/** Панель управления*/
Route::group(['middleware' => ['auth:sanctum', 'panel_user']], function (){
    Route::group(['prefix' => 'admin'], function () {
        Route::get('/products', [\App\Http\Controllers\Admin\ProductsController::class, 'get'])
            ->name('api.admin.products');
        Route::post('/product/save/{product}', [\App\Http\Controllers\Admin\ProductsController::class, 'save'])
            ->name('api.admin.product.save');
        Route::get('/product/delete/{product}', [\App\Http\Controllers\Admin\ProductsController::class, 'delete'])
            ->name('api.admin.product.delete');
    });


});
