<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MainController;

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
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

Route::prefix('users')->name('users.')->middleware(['auth'])->group(function () {
    #Homepage
    Route::get('/', [MainController::class, 'index'])->name('index');
});