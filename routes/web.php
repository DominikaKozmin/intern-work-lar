<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArticlesController;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/jobs', 'App\Http\Controllers\OffersController@index');
Route::get('/pracownik', 'App\Http\Controllers\PracownikController@index');
Route::get('/pracodawca', 'App\Http\Controllers\PracodawcaController@index');
Route::get('/zakwaterowanie', 'App\Http\Controllers\AccommodationController@index');

Route::resource('/artykuly', ArticlesController::class);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
