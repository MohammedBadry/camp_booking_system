<?php

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

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\Entry\DashboardController;
use App\Http\Controllers\Backend\Entry\BookingsController;

Route::group(['namespace' => 'App\Http\Controllers\Backend'], function () {

    Route::get('/', function (){
        return redirect()->route('entry.login');
    });

    /*authentication*/
    Route::group(['namespace' => 'Auth', 'as'=>'entry.'], function () {
        require __DIR__.'/auth.php';
    });

    /*authenticated*/
    Route::group(['namespace' => 'Entry', 'middleware' => ['entry'], 'as'=>'entry.'], function () {
        Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
        Route::get('scanner', [DashboardController::class, 'scanner'])->name('scanner');
        Route::post('logout', [DashboardController::class, 'logout'])->name('auth.logout');

        Route::group(['as'=>'bookings.'], function () {
            Route::get('bookings/{id}', [BookingsController::class, 'show'])->name('show');
            Route::get('bookings/{id}/success', [BookingsController::class, 'success'])->name('success');
            Route::post('bookings/{id}', [BookingsController::class, 'update'])->name('update');
        });
    });

});
