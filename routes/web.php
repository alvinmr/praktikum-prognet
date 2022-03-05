<?php

use App\Http\Controllers\Admin\Auth\LoginController;
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
    // Ini route yang bisa diakses kalo udah login dari admin
    Route::middleware('auth:admin')->group(function () {
        Route::view('/', 'admin.dashboard.index')->name('index');
        Route::post('logout', [LoginController::class, 'logout'])->name('logout');
    });
    // Ini route yang bisa diakses kalo udah belom login admin, kalo udah login gabisa akses route ini
    Route::middleware('guest:admin')->group(function () {
        Route::view('login', 'admin.auth.login')->name('login');
        Route::post('login', [LoginController::class, 'login'])->name('login');
    });
});


// route user
// Ini route yang bisa diakses kalo udah login dari user
Route::middleware('auth')->group(function () {
    Route::view('/', 'user.home.index')->name('home');
});
// Ini route yang bisa diakses kalo udah belom login user, kalo udah login gabisa akses route ini
Route::middleware('guest')->group(function () {
    Route::view('login', 'user.auth.login')->name('login');
    Route::post('login', [LoginController::class, 'login'])->name('login');
});

Auth::routes(['verify' => true]);