<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\OffersController;
use App\Http\Controllers\Api\CategoriesApiController;
use App\Http\Controllers\Api\MiscellaneousApiController;

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

Route::get('latestoffers', [OffersController::class, 'latestOffers']);
Route::get('latestoffers/{id}', [CategoriesApiController::class, 'latestOffers']);
Route::get('salary', [OffersController::class, 'salary']);
Route::get('salary/{id}', [CategoriesApiController::class, 'salary']);
Route::get('jobtitle', [OffersController::class, 'jobtitle']);
Route::get('jobtitle/{id}', [CategoriesApiController::class, 'jobtitle']);

Route::get('partners', [MiscellaneousApiController::class, 'partners']);
Route::get('abilities', [MiscellaneousApiController::class, 'abilities']);
Route::get('levels', [MiscellaneousApiController::class, 'levels']);
Route::get('types', [MiscellaneousApiController::class, 'types']);