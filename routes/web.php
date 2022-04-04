<?php

use App\Http\Controllers\Admin\Auth\LoginController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\ProductResourceController;
use App\Http\Controllers\Admin\CourierController;
use App\Http\Controllers\Admin\ProductCategoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductUserController;
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

        Route::resource('/product', ProductResourceController::class);
        Route::post('/product/images', [ProductResourceController::class, 'uploadImage'])->name('product.images.upload');
        Route::delete('/product/images/delete', [ProductResourceController::class, 'revertImage'])->name('product.images.revert');

        Route::resource('/productcategory', ProductCategoryController::class);

        Route::resource('/courier', CourierController::class);

    });
    // Ini route yang bisa diakses kalo belom login admin, kalo udah login gabisa akses route ini
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
    Route::get('product/{product}', [ProductUserController::class, 'show'])->name('product.show');
    Route::get('product/{product}/buy-now', [ProductUserController::class, 'buyNow'])->name('product.buynow');
    Route::post('product/{product}/review', [ProductUserController::class, 'storeReview'])->name('review.store');
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