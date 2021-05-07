<?php

use App\Http\Controllers\CostumersController;
use App\Http\Controllers\OrdersController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\OrdersProductController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('clientes')->group(function () {
    Route::get('/', [CostumersController::class, 'index']);
    Route::get('/{id}', [CostumersController::class, 'show']);
    Route::post('/', [CostumersController::class, 'store']);
    Route::put('/{id}', [CostumersController::class, 'update']);
    Route::delete('/{id}', [CostumersController::class, 'destroy']);
});

Route::prefix('produtos')->group(function () {
    Route::get('/', [ProductsController::class, 'index']);
    Route::get('/{id}', [ProductsController::class, 'show']);
    Route::post('/', [ProductsController::class, 'store']);
    Route::put('/{id}', [ProductsController::class, 'update']);
    Route::delete('/{id}', [ProductsController::class, 'destroy']);
});

Route::prefix('pedidos')->group(function () {
    Route::get('/', [OrdersController::class, 'index']);
    Route::get('/{id}', [OrdersController::class, 'show']);
    Route::post('/', [OrdersController::class, 'store']);
    Route::put('/{id}', [OrdersController::class, 'update']);
    Route::delete('/{id}', [OrdersController::class, 'destroy']);

    Route::prefix('produtos')->group(function () {
        Route::post('/{id}', [OrdersProductController::class, 'store']);
    });
});
