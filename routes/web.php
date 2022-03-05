<?php

use Illuminate\Support\Facades\Auth;
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

// route admin
Route::prefix('admin')->name('admin.')->group(function () {
    Route::view('/', 'admin.dashboard.index')->name('index');
    Route::view('login', 'admin.auth.login')->name('login');
});


// route user
Route::get('/', function () {
    return view('user.home.index');
})->name('home');
Route::view('auth', 'user.auth.index')->name('auth');

Auth::routes(['verify' => true]);