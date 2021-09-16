<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArticlesController;
use App\Http\Controllers\OffersController;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return view('welcome');
});


Route::get('/pracownik', 'App\Http\Controllers\EmployeeController@index');
Route::get('/pracodawca', 'App\Http\Controllers\EmployerController@index');
Route::get('/zakwaterowanie', 'App\Http\Controllers\AccommodationController@index');

Route::resource('/oferty', OffersController::class);
Route::resource('/artykuly', ArticlesController::class);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
