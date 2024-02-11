<?php

use App\Http\Controllers\ClientesController;
use App\Http\Controllers\ProductoController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
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

Route::middleware(['isConected'])->group(function () {
    Route::post('product/create', [ProductoController::class, 'Create_product']);
    Route::get('product/getTotal', [ProductoController::class, 'getTotal']);
    Route::get('product/getStock/{stock?}', [ProductoController::class, 'getStock']);
    Route::post('product/update/{stock?}/{id?}', [ProductoController::class, 'updateCant']);
    Route::get('client/getClients', [ClientesController::class, 'getClients']);
    Route::get('client/getclientbyid/{id?}', [ClientesController::class, 'getClientbyDocument']);
});


Route::get('generatetoken/{document?}/{id?}', [UserController::class, 'generateToken']);