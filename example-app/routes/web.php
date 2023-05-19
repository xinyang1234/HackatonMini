<?php

use App\Http\Controllers\AuthContoller;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

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

Route::group(['middleware' => 'guest'], function () {
    Route::get('/register', [AuthContoller::class, 'register'])->name('register');
    Route::post('/register', [AuthContoller::class, 'registerPost'])->name('register');
    Route::get('/login', [AuthContoller::class, 'login'])->name('login');
    Route::post('/login', [AuthContoller::class, 'loginPost'])->name('login');
});

Route::group(['middleware' => 'auth'], function () {
    Route::get('/home', [HomeController::class, 'index']);
    Route::delete('/logout', [AuthContoller::class, 'logout'])->name('logout');
});
