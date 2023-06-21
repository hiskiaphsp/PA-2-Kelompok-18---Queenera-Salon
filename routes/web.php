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
use App\Http\Controllers\AuthenticatedSessionController;
use App\Http\Controllers\Web\RatingController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\PdfController;
use Laravel\Fortify\Fortify;

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

    Route::get('test', function(){
        return view('layouts.invoice.print');
    });
    Route::get('invoice/{id}/pdf', [PdfController::class, 'invoicePdf'])->name('invoice.pdf');
    Route::get('booking/{id}/pdf', [PdfController::class, 'bookingPdf'])->name('booking.pdf');
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

        // Rute untuk menampilkan halaman lupa password
        Route::get('/forgot-password', function () {
            return view('pages.auth.forgot-password');
        })->name('password.request');

        // Rute untuk mengirim email reset password
        Route::post('/forgot-password', [AuthenticatedSessionController::class, 'forgotPassword'])
            ->middleware(['throttle:6,1'])
            ->name('password.email');

        // Rute untuk menampilkan halaman reset password
        Route::get('/reset-password/{token}', function ($token) {
            return view('pages.auth.reset', ['token' => $token]);
        })->name('password.reset');

        // Rute untuk melakukan reset password
        Route::post('/reset-password', [AuthenticatedSessionController::class, 'resetPassword'])
            ->name('password.update');
    });

    Route::middleware('auth')->group(function(){
        Route::get('/logout', [AuthController::class, 'logout']);
    });

    Route::middleware('role:customer')->group(function(){
        // Cart
        Route::resource('cart', CartController::Class);
        Route::get('load', [ProductController::class, 'loadCart'])->name('cart.load');
        Route::post('product/add-to-cart', [ProductController::Class, 'addToCart'])->name('product.addToCart');
        Route::post('/cart/remove', [ProductController::class, 'removeFromCart']);

        // Booking
        Route::resource('booking', BookingController::Class);
        Route::put('booking/{id}/cancel', [BookingController::Class, 'cancel_booking'])->name('booking.cancel');

        // Profile
        Route::get('user/{id}/profile', [ProfileController::Class, 'show'])->name('user.profile');
        Route::put('user/{id}/update', [ProfileController::Class, 'update'])->name('user.profile.update');

        // Order
        Route::get('order', [OrderController::class, 'index'])->name('order.index');
        Route::get('order/{id}/show', [OrderController::class, 'show'])->name('order.show');
        Route::put('order/{id}/cancel', [OrderController::Class, 'cancelOrder'])->name('order.cancel');
        Route::post('checkout', [OrderController::class, 'checkout'])->name('checkout');
        Route::post('order/makeOrder/{id}', [OrderController::class, 'makeOrder'])->name('order.makeOrder');

        // Notification
        Route::get('notification', [NotificationController::class, 'index'])->name('notification.index');
        Route::get('notification/counter', [NotificationController::class, 'counter'])->name('counter_notif');
        Route::get('notification/read', [NotificationController::class, 'markRead'])->name('notification.markRead');
        Route::delete('notification/{id}/delete', [NotificationController::class, 'destroy'])->name('notification.destroy');


        //Rating
        Route::post('rating/store-service/{id}', [RatingController::class, 'store_service'])->name('rating.store-service');
        Route::post('rating/store/{id}', [RatingController::class, 'store'])->name('rating.store');
        Route::put('/rating/update/{id}', [RatingController::class, 'update'])->name('rating.update');
    });

    // Product
    Route::resource('product', ProductController::Class);
    Route::get('/product/search', [ProductController::class, 'search'])->name('product.search');


    // Service
    Route::get('service', [ServiceController::class, 'index'])->name('service.index');
    Route::get('service/{id}/show', [ServiceController::class, 'show'])->name('service.show');

});
