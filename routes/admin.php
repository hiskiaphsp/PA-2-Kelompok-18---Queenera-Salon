<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\BookingController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\OrderController;
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
    Route::get('/dashboard', function () {
        return view('pages.admin.dashboard.main');
    })->name('dashboard');

    // Booking
    Route::get('booking', [BookingController::class, 'index']);
    Route::put('booking/{id}/accept', [BookingController::Class, 'accept_booking'])->name('booking.accept');
    Route::put('booking/{id}/reject', [BookingController::Class, 'reject_booking'])->name('booking.reject');
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
    Route::put('order/{id}/accept', [OrderController::Class, 'accept_order'])->name('order.accept');
    Route::put('order/{id}/reject', [OrderController::Class, 'reject_order'])->name('order.reject');
    Route::delete('order/{id}/delete', [OrderController::Class, 'delete'])->name('order.delete');

    // Notification
    Route::get('counter', [NotificationController::class, 'counter'])->name('counter_notif');
    Route::get('notification', [NotificationController::class, 'index'])->name('notification.index');
    Route::get('notification/read', [NotificationController::class, 'markRead'])->name('notification.markRead');
});

