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
use App\Http\Controllers\Web\NotificationController;

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
    Route::get('403', function () {
            return view('pages.error.403');
        })->name('403');
    Route::get('403', function () {
            return view('pages.error.404');
        })->name('403');
    Route::middleware('guest')->group(function (){
        Route::get('/register', [AuthController::class, 'register'])->name('auth.register');
        Route::get('/login', [AuthController::class, 'login'])->name('auth.login');
        Route::post('/register', [AuthController::class, 'do_register'])->name('auth.do_register');
        Route::post('/login', [AuthController::class, 'do_login'])->name('auth.do_login');
    });

    Route::middleware('auth')->group(function(){
        Route::get('/logout', [AuthController::class, 'logout']);
    });

    // Product
    Route::resource('product', ProductController::Class);
    Route::get('/product/search', [ProductController::class, 'search'])->name('product.search');

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
    Route::get('order', [OrderController::class, 'index'])->name('order.index');
    Route::get('order/{id}/show', [OrderController::class, 'show'])->name('order.show');
    Route::put('order/{id}/cancel', [OrderController::Class, 'cancelOrder'])->name('order.cancel');
    Route::post('checkout', [OrderController::class, 'checkout'])->name('checkout');

    // Notification
    Route::get('notification', [NotificationController::class, 'index'])->name('notification.index');
    Route::get('notification/counter', [NotificationController::class, 'counter'])->name('counter_notif');
    Route::delete('notification/{id}/delete', [NotificationController::class, 'destroy'])->name('notification.destroy');


});
