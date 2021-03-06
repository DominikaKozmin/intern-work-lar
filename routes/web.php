<?php

use App\Http\Controllers\AccommodationsController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArticlesController;
use App\Http\Controllers\OffersController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\MessagesController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RegisterEmployerController;
use App\Http\Controllers\RegisterEmployeeController;
use Illuminate\Support\Facades\Auth;

Route::get('/', [PagesController::class, 'index']);
Route::get('/pracownik', [PagesController::class, 'employee']);
Route::get('/pracodawca', [PagesController::class, 'employer']);
Route::get('/category/{id}', [CategoriesController::class, 'show']);


Route::resource('/oferty', OffersController::class);
Route::resource('/artykuly', ArticlesController::class);
Route::resource('/zakwaterowanie', AccommodationsController::class);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/register-employer', [RegisterEmployerController::class, 'create']);
Route::POST('/register-employer', [RegisterEmployerController::class, 'store']);


Route::get('/register-employee', [RegisterEmployeeController::class, 'create']);
Route::POST('/register-employee', [RegisterEmployeeController::class, 'store']);

Route::get('test', [PagesController::class, 'test']);

Route::prefix('profil')->middleware('auth')->group(function (){
    Route::get('/', [ProfileController::class, 'index']);
    Route::get('ustawienia', [ProfileController::class, 'settings']);
    Route::post('changepassword', [ProfileController::class, 'changePassword']);
    Route::post('changeavatar', [ProfileController::class, 'changeAvatar']);
    Route::get('wiadomosci', [ProfileController::class, 'messages']);
    Route::get('wiadomosc/{id}', [MessagesController::class, 'show']);
});

Route::POST('submitmessage', [MessagesController::class, 'submit']);