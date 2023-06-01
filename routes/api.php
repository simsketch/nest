<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Bird;
use App\Http\Controllers\BirdsApiController;

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

Route::get('/birds', [BirdsApiController::class, 'index']);

Route::post('/birds', [BirdsApiController::class, 'create']);

Route::put('/birds/{bird}', [BirdsApiController::class, 'update']);

Route::delete('/birds/{bird}', [BirdsApiController::class, 'delete']);

Route::put('/birds/{bird}/walk', [BirdsApiController::class, 'walk']);

Route::put('/birds/{bird}/drink', [BirdsApiController::class, 'drink']);

Route::put('/birds/{bird}/eat', [BirdsApiController::class, 'eat']);

Route::put('/birds/{bird}/excrete', [BirdsApiController::class, 'excrete']);

Route::get('/birds/{bird}/isAlive', [BirdsApiController::class, 'isAlive']);

Route::get('/birds/{bird}/isHungry', [BirdsApiController::class, 'isHungry']);
