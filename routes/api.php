<?php

use App\Http\Controllers\CarritoController;
use App\Http\Controllers\ClientesController;
use App\Http\Controllers\ItemsController;
use App\Http\Controllers\MetodosEnvioController;
use App\Http\Controllers\MetodosPagoController;
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
    Route::get('carrito/getcars', [CarritoController::class, 'getAllCars']);
    Route::get('items/getitems', [ItemsController::class, 'getItems']);
    Route::get('items/getitem/{id?}', [ItemsController::class, 'getItemsById']);
    Route::get('menvios/getmethods', [MetodosEnvioController::class, 'getMethods']);
    Route::post('menvios/createmethod', [MetodosEnvioController::class, 'createMethod']);
    Route::get('mepagos/getmethods', [MetodosPagoController::class, 'getMethods']);
    Route::post('mepagos/createmethod', [MetodosPagoController::class, 'createMethod']);
});


Route::get('generatetoken/{document?}/{id?}', [UserController::class, 'generateToken']);
Route::get('carrito/getcar/{id?}', [CarritoController::class, 'getCar']);
Route::post('carrito/create', [CarritoController::class, 'create']);