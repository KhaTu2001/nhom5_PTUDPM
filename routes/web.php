<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\FormController;
use App\Http\Controllers\SurveyController;
use App\Http\Controllers\SheetController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [LoginController::class, 'login'])->name('login');
Route::post('/', [LoginController::class, 'authenticate'])->name('authenticate');
Route::get('/forgot-password', [LoginController::class, 'forgotPassword'])->name('forgot-password');
Route::get('/sign-up', [LoginController::class, 'signup'])->name('signup');
Route::post('/sign-up', [LoginController::class, 'create'])->name('create');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

Route::prefix('users')->name('users.')->middleware(['auth'])->group(function () {
    #Homepage
    Route::get('/', [MainController::class, 'index'])->name('index');
    Route::get('/search', [MainController::class, 'search'])->name('search');
    Route::post('/search', [MainController::class, 'show']);
    #Form
    Route::resource('form', FormController::class);
    #Survey
    Route::resource('survey', SurveyController::class);
    Route::get('survey/participant/{survey}', [SurveyController::class, 'participant'])->name('participant');
    Route::get('survey/statistic/{survey}', [SurveyController::class, 'statistic'])->name('statistic');
    #sheet
    Route::resource('sheet', SheetController::class);
});