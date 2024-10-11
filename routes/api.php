<?php

use App\Http\Controllers\ClienteController;
use App\Http\Controllers\EmpresaController;
use App\Http\Controllers\UsuarioController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::middleware('auth:sanctum')->group(function () {

    Route::group(['prefix' => '/empresa'], function() {
        Route::get('/index', [EmpresaController::class, 'index']);
        Route::post('/store', [EmpresaController::class, 'store']);
        Route::post('/update/{id}', [EmpresaController::class, 'update']);
        Route::post('/destroy/{id}', [EmpresaController::class, 'destroy']);
    });

    Route::group(['prefix' => '/usuario'], function() {
        Route::get('/index', [UsuarioController::class, 'index']);
        Route::post('/store', [UsuarioController::class, 'store']);
        Route::post('/update/{id}', [UsuarioController::class, 'update']);
        Route::post('/destroy/{id}', [UsuarioController::class, 'destroy']);
    });

    Route::group(['prefix' => '/cliente'], function() {
        Route::get('/index', [ClienteController::class, 'index']);
        Route::post('/store', [ClienteController::class, 'store']);
        Route::post('/update/{id}', [ClienteController::class, 'update']);
        Route::post('/destroy/{id}', [ClienteController::class, 'destroy']);
    });
});
