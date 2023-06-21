<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\BookingController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\NotificationController;
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

Route::middleware('role:admin')->prefix('admin')->name('admin.')->group(function () {
    // Dashboard
    Route::get('/dashboard', [DashboardController::Class, 'index'])->name('dashboard');

    // Booking
    Route::resource('booking', BookingController::class);
    Route::put('booking/{id}/complete', [BookingController::Class, 'complete_booking'])->name('booking.complete');
    Route::put('booking/{id}/cancel', [BookingController::Class, 'cancel_booking'])->name('booking.cancel');
    Route::delete('booking/{id}/delete', [BookingController::Class, 'delete'])->name('booking.delete');

    // Product
    Route::resource('product', ProductController::class);

    // Service
    Route::resource('service', ServiceController::class);

    // User
    Route::resource('user', UserController::class);
    Route::put('/user/{id}/change-role/{newRole}', [UserController::class, 'change_role'])->name('user.change_role');

    // Order
    Route::resource('order', OrderController::class);
    Route::put('order/{id}/complete', [OrderController::Class, 'complete_order'])->name('order.complete');
    Route::put('order/{id}/cancel', [OrderController::Class, 'cancel_order'])->name('order.cancel');
    Route::delete('order/{id}/delete', [OrderController::Class, 'delete'])->name('order.delete');


    // Notification
    Route::get('counter', [NotificationController::class, 'counter'])->name('counter_notif');
    Route::get('notification', [NotificationController::class, 'index'])->name('notification.index');
    Route::get('notification/read', [NotificationController::class, 'markRead'])->name('notification.markRead');
    Route::delete('notification/{id}/delete', [NotificationController::class, 'destroy'])->name('notification.destroy');
});

