<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArticlesController;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/oferty', 'App\Http\Controllers\OffersController@index');
Route::get('/pracownik', 'App\Http\Controllers\EmployeeController@index');
Route::get('/pracodawca', 'App\Http\Controllers\EmployerController@index');
Route::get('/zakwaterowanie', 'App\Http\Controllers\AccommodationController@index');

Route::resource('/artykuły', ArticlesController::class);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
