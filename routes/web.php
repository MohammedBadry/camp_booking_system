<?php

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

use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\BookingsController;

require __DIR__.'/basic_auth.php';

Route::group(['as' => 'frontend.'], function () {
    Route::get('/', [HomeController::class, 'index'])->name('index');
    Route::get('book-info/{members_reference}', [HomeController::class, 'book_info'])->name('book-info');
    Route::get('camps', [HomeController::class, 'camps'])->name('camps');
    Route::get('camps/{id}', [HomeController::class, 'show_camp'])->name('camps.show');
    Route::get('camp/extras', [HomeController::class, 'extras'])->name('camp.extras');
    Route::get('extra/add', [HomeController::class, 'extra_add'])->name('extra.add');
    Route::get('extra/remove', [HomeController::class, 'extra_remove'])->name('extra.remove');
    Route::get('operators', [HomeController::class, 'operators'])->name('operators.index');
    Route::get('operators/{id}', [HomeController::class, 'operator'])->name('operators.show');
    Route::get('about-us', [HomeController::class, 'about_us'])->name('about-us');
    Route::get('king-reserve', [HomeController::class, 'king_reserve'])->name('king-reserve');
    Route::get('make-trip', [HomeController::class, 'make_trip'])->name('make-trip');
    Route::post('send-trip-design', [HomeController::class, 'send_trip_design_request'])->name('send-trip-design');
    Route::get('trips/{id}', [HomeController::class, 'show_trip'])->name('trips.show');
    Route::get('trips/{id}/book', [HomeController::class, 'book_trip'])->name('trips.book');
    Route::get('terms/{id}', [HomeController::class, 'terms'])->name('terms');
    Route::get('contact-us', [HomeController::class, 'contact_us'])->name('contact-us');
    Route::post('send-request', [HomeController::class, 'send_request'])->name('send-request');

    Route::get('bookings/apply-coupon', [BookingsController::class, 'apply_coupon'])->name('bookings.apply-coupon');
    Route::post('bookings/{trip_id}', [BookingsController::class, 'store'])->name('bookings.store');
    Route::get('bookings/{id}/invoice', [BookingsController::class, 'generate_invoice'])->name('bookings.invoice');
    Route::get('bookings/booking-action', [BookingsController::class, 'booking_action'])->name('booking-action');
});
