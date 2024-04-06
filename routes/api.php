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

Route::group(['prefix' => 'order'], function () {
    Route::post('/create', [\App\Http\Controllers\OrderController::class, 'create'])->name('order.create');
});

/** Панель управления*/
Route::group(['middleware' => ['auth:sanctum', 'panel_user']], function (){
    Route::group(['prefix' => 'admin'], function () {

        Route::get('/users', [\App\Http\Controllers\Admin\MainController::class, 'usersList'])
            ->name('api.admin.users');

        Route::get('/clients', [\App\Http\Controllers\Admin\MainController::class, 'clientList'])
            ->name('api.admin.clients');

        Route::post('/users/save/{user}', [\App\Http\Controllers\Admin\MainController::class, 'saveUser'])
            ->name('api.admin.user.save');

        Route::post('/discount/save', [\App\Http\Controllers\Admin\MainController::class, 'saveDiscount'])
            ->name('api.admin.discount.save');

        Route::get('/products', [\App\Http\Controllers\Admin\ProductsController::class, 'get'])
            ->name('api.admin.products');
        Route::get('/products/archive', [\App\Http\Controllers\Admin\ProductsController::class, 'archiveProducts'])
            ->name('api.admin.products.archive');
        Route::post('/product/save/{product}', [\App\Http\Controllers\Admin\ProductsController::class, 'save'])
            ->name('api.admin.product.save');
        Route::get('/product/delete/{product}', [\App\Http\Controllers\Admin\ProductsController::class, 'delete'])
            ->name('api.admin.product.delete');

        Route::get('/orders', [\App\Http\Controllers\Admin\OrdersController::class, 'get'])
            ->name('api.admin.orders');
        Route::post('/order/save/{order}', [\App\Http\Controllers\Admin\OrdersController::class, 'save'])
            ->name('api.admin.order.save');
        Route::post('/order/removeProduct/{order}', [\App\Http\Controllers\Admin\OrdersController::class, 'removeProduct'])
            ->name('api.admin.order.removeProduct');
    });


});
