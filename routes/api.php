<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\API\StoreController;
use App\Http\Controllers\API\EtsyController;

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

Route::resource('store', StoreController::class);
Route::resource('etsy', EtsyController::class);
Route::get('etsy/test-apikey/{apikey}', [EtsyController::class, 'testApiKey']);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
