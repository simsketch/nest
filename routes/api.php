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

Route::get('/birds', function () {
    return Bird::all();
});

Route::get('/birds', [BirdsApiController::class, 'index']);

Route::post('/birds', function () {
    request()->validate([
        'name' => 'required',
        'description' => 'required',
    ]);
    return Bird::create([
        'name' => request('name'),
        'description' => request('description'),
    ]);
});

Route::put('/birds/{bird}', function(Bird $bird) {
    request()->validate([
        'name' => 'required',
        'description' => 'required',
    ]);
    $success = $bird->update([
        'name' => request('name'),
        'description' => request('description'),
    ]);
    return [
        'success' => $success
    ];
});
Route::delete('/birds/{bird}', function(Bird $bird) {
    $success = $bird->delete();
    return [
        'success' => $success
    ];
});