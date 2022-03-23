<?php

use App\Http\Controllers\Admin\Auth\LoginController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\TransactionController;
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
        Route::view('/dashboard', 'admin.dashboard.index')->name('index');
        Route::post('logout', [LoginController::class, 'logout'])->name('logout');

        Route::resource('/product',ProductController::class);

        // Route::view('/product', 'admin.product.index')->name('product.index');
        // Route::view('/product/create', 'admin.product.create')->name('product.create');
        // Route::view('/product/show', 'admin.product.show')->name('product.show');


    });
    // Ini route yang bisa diakses kalo udah belom login admin, kalo udah login gabisa akses route ini
    Route::middleware('guest:admin')->group(function () {
        Route::view('login', 'admin.auth.login')->name('login');
        Route::post('login', [LoginController::class, 'login'])->name('login');
    });
});


// route user
// Route::view('/', 'user.home.index')->name('home');
Route::get('/', [HomeController::class, 'index'])->name('home');
// Ini route yang bisa diakses kalo udah login dari user
Route::middleware('auth')->group(function () {
    Route::view('cart', 'user.cart.index')->name('cart');
    Route::get('product/{product}', [ProductController::class, 'show'])->name('product.show');
    Route::get('product/{product}/buy-now', [ProductController::class, 'buyNow'])->name('product.buynow');
    Route::post('product/{product}/review', [ProductController::class, 'storeReview'])->name('review.store');
    Route::view('product', 'user.product.show')->name('product');
    Route::view('checkout', 'user.transaction.checkout')->name('checkout');
    Route::get('payment/{transaction}', [TransactionController::class, 'payment'])->name('payment');
    Route::post('payment/{transaction}/proof_payment', [TransactionController::class, 'uploadProofPayment'])->name('proof_payment');
});
// Ini route yang bisa diakses kalo udah belom login user, kalo udah login gabisa akses route ini
Route::middleware('guest')->group(function () {
    Route::view('login', 'user.auth.login')->name('login');
    Route::post('login', [LoginController::class, 'login'])->name('login');
});

Auth::routes(['verify' => true]);