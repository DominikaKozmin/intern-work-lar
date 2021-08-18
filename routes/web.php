<?php

use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/jobs', 'App\Http\Controllers\OffersController@index');
Route::get('/pracownik', 'App\Http\Controllers\PracownikController@index');
Route::get('/pracodawca', 'App\Http\Controllers\PracodawcaController@index');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
