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

// prefix admin
Route::prefix('admin')->group(function () {
    Route::view('/', 'admin.dashboard.index')->name('index');
    Route::view('login', 'admin.auth.login')->name('login');
});

Route::get('/', function () {
    return view('user.home.index');
})->middleware('verified');

Route::get('login', function () {
    return view('user.auth.login');
});

Auth::routes(['verify' => true]);