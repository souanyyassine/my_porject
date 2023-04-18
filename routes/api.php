<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\SocieteController;
use App\Http\Controllers\API\UserController;

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

Route::post('login', [UserController::class, 'login']);
Route::post('register', [UserController::class, 'register']);
Route::post('logout', [UserController::class, 'logout'])->middleware('auth:sanctum');

Route::group(['prefix' => 'societes', 'middleware' => 'auth:sanctum'], function () {
    Route::get('/', [SocieteController::class, 'index']);
    Route::post('add', [SocieteController::class, 'add']);
    Route::get('edit/{id}', [SocieteController::class, 'edit']);
    Route::post('update/{id}', [SocieteController::class, 'update']);
    Route::delete('delete/{id}', [SocieteController::class, 'delete']);
});