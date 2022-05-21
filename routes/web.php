<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\Auth\LoginController;
use App\Http\Controllers\Admin\ProductResourceController;
use App\Http\Controllers\Admin\CourierController;
use App\Http\Controllers\Admin\ProductCategoryController;
use App\Http\Controllers\Admin\DiscountController;
use App\Http\Controllers\Admin\TransactionResourceController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OrderUserController;
use App\Http\Controllers\ProductUserController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\UserController;
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

        Route::get('/markNotifAdmin', [AdminController::class, 'markNotifications'])->name('mark-notifications');

        Route::resource('/product', ProductResourceController::class);
        Route::post('/product/images', [ProductResourceController::class, 'uploadImage'])->name('product.images.upload');
        Route::delete('/product/images/delete', [ProductResourceController::class, 'revertImage'])->name('product.images.revert');
        Route::post('/product/{id}/category/', [ProductResourceController::class, 'addCategory'])->name('product.category.add');
        Route::post('/product/{id}/image/', [ProductResourceController::class, 'addImage'])->name('product.image.add');
        Route::get('/product/{id}/deleteImage', [ProductResourceController::class, 'destroyImage']);
        Route::post('/product/{product}/deleteCategory', [ProductResourceController::class, 'destroyCategory'])->name('product.delete-category');
        Route::get('/product/{id}/delete', [ProductResourceController::class, 'destroy']);
        Route::get('/product/{id}/reviews', [ProductResourceController::class, 'listReviewProduct'])->name('product.reviews');
        Route::post('/product/{id}/review-response', [ProductResourceController::class, 'responseReview'])->name('product.review-response');


        Route::resource('/productcategory', ProductCategoryController::class);
        Route::get('/productcategory/{id}/delete', [ProductCategoryController::class, 'destroy'])->name('admin.productcategory.destroy');

        Route::resource('/courier', CourierController::class);
        Route::get('/courier/{id}/delete', [CourierController::class, 'destroy'])->name('admin.courier.destroy');

        Route::resource('/discount', DiscountController::class);
        Route::get('/discount/{id}/delete', [DiscountController::class, 'destroy'])->name('admin.discount.destroy');

        Route::resource('transaction', TransactionResourceController::class);
        Route::post('transaction/{transaction}/accept', [TransactionResourceController::class, 'acceptPayment'])->name('transaction.accept');
        Route::post('transaction/{transaction}/shipped', [TransactionResourceController::class, 'updateShipped'])->name('transaction.shipped');
        Route::post('transaction/{transaction}/cancel', [TransactionResourceController::class, 'cancelTransaction'])->name('transaction.cancel');
    });
    // Ini route yang bisa diakses kalo belom login admin, kalo udah login gabisa akses route ini
    Route::middleware('guest:admin')->group(function () {
        Route::view('login', 'admin.auth.login')->name('login');
        Route::post('login', [LoginController::class, 'login'])->name('login');
    });
});


// route user
Route::view('/', 'user.home.index')->name('home');
Route::get('product/{product}', [ProductUserController::class, 'show'])->name('product.show');
// Ini route yang bisa diakses kalo udah login dari user
Route::middleware('auth')->group(function () {
    Route::view('cart', 'user.cart.index')->name('cart');
    Route::get('/markNotifUser', [UserController::class, 'markNotifications'])->name('user.mark-notifications');

    Route::middleware('verified')->group(function () {
        Route::get('product/{product}/buy-now', [ProductUserController::class, 'buyNow'])->name('product.buynow');
        Route::post('product/{product}/review', [ProductUserController::class, 'storeReview'])->name('review.store');
        Route::view('product', 'user.product.show')->name('product');
        Route::view('checkout', 'user.transaction.checkout')->name('checkout');
        Route::get('payment/{transaction}', [TransactionController::class, 'payment'])->name('payment');
        Route::post('payment/{transaction}/proof_payment', [TransactionController::class, 'uploadProofPayment'])->name('proof_payment');
        Route::post('payment/{transaction}', [TransactionController::class, 'deleteTransaction'])->name('delete-transaction');
    });
    Route::get('my-transaction', [OrderUserController::class, 'index'])->name('my-transaction');
});
// Ini route yang bisa diakses kalo udah belom login user, kalo udah login gabisa akses route ini
Route::middleware('guest')->group(function () {
    Route::view('login', 'user.auth.login')->name('login');
    Route::post('login', [LoginController::class, 'login'])->name('login');
});

Auth::routes(['verify' => true]);