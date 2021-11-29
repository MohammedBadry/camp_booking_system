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
use App\Http\Controllers\Backend\Operator\DashboardController;
use App\Http\Controllers\Backend\Operator\ProfileController;

Route::group(['namespace' => 'App\Http\Controllers\Backend'], function () {

    Route::get('/', function (){
        return redirect()->route('operator.login');
    });

    /*authentication*/
    Route::group(['namespace' => 'Auth', 'as'=>'operator.'], function () {
        require __DIR__.'/auth.php';
    });

    /*authenticated*/
    Route::group(['namespace' => 'Operator', 'middleware' => ['operator'], 'as'=>'operator.'], function () {
        Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
        Route::resource('trips', TripsController::class);
        Route::resource('bookings', BookingsController::class);
        Route::post('/bookings/import', [App\Http\Controllers\Backend\Operator\BookingsController::class, 'import'])->name('bookings.import');
        //profile controller
        Route::group(['prefix' => 'profile', 'as'=>'profile.'], function () {
            Route::get('/', [ProfileController::class, 'index'])->name('index');
            Route::post('/', [ProfileController::class, 'update'])->name('update');
            Route::post('logout', [ProfileController::class, 'logout'])->name('logout');
        });
    });

});
