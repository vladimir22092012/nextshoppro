<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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
