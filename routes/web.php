<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Web\ProductController;
use App\Http\Controllers\Web\ServiceController;
use App\Http\Controllers\Web\BookingController;
use App\Http\Controllers\Web\ProfileController;
use App\Http\Controllers\Web\DashboardController;
use App\Http\Controllers\Web\CartController;
use App\Http\Controllers\Web\OrderController;

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
require __DIR__.'/admin.php';
Route::group(['domain'=>''],function(){
    Route::get('/', [DashboardController::class, 'index'])->name('home');

    Route::middleware('guest')->group(function (){
         Route::get('login', function () {
            return view('pages.auth.login');
        })->name('login');
        Route::get('/register', function () {
            return view('pages.auth.register');
        });
        Route::post('/do_register', [AuthController::class, 'register']);
        Route::post('/do_login', [AuthController::class, 'login']);
    });

    Route::middleware('auth')->group(function(){
        Route::get('/logout', [AuthController::class, 'logout']);
    });

    // Product
    Route::resource('product', ProductController::Class);

    // Cart
    Route::post('product/add-to-cart', [ProductController::Class, 'addToCart'])->name('product.addToCart')->middleware('auth');
    Route::post('/cart/remove', [ProductController::class, 'removeFromCart']);
    Route::resource('cart', CartController::Class);
    Route::get('load', [ProductController::class, 'loadCart']);

    // Service
    Route::resource('service', ServiceController::Class);

    // Booking
    Route::resource('booking', BookingController::Class);
    Route::put('booking/{id}/cancel', [BookingController::Class, 'cancel_booking'])->name('booking.cancel')->middleware('auth');

    // Profile
    Route::get('user/{id}/profile', [ProfileController::Class, 'show'])->name('user.profile');
    Route::put('user/{id}/update', [ProfileController::Class, 'update'])->name('user.profile.update');

    // Order
    Route::get('order', [OrderController::class, 'index'])->name('order');
    Route::get('order/{id}/show', [OrderController::class, 'show'])->name('order.show');
    Route::put('order/{id}/cancel', [OrderController::Class, 'cancelOrder'])->name('order.cancel');
    Route::post('checkout', [OrderController::class, 'checkout'])->name('checkout');


});
