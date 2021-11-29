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
use App\Http\Controllers\Backend\Company\DashboardController;
use App\Http\Controllers\Backend\Company\ProfileController;

Route::group(['namespace' => 'App\Http\Controllers\Backend'], function () {

    Route::get('/', function (){
        return redirect()->route('company.login');
    });

    /*authentication*/
    Route::group(['namespace' => 'Auth', 'as'=>'company.'], function () {
        require __DIR__.'/auth.php';
    });

    /*authenticated*/
    Route::group(['namespace' => 'Company', 'middleware' => ['company'], 'as'=>'company.'], function () {
        Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
        Route::resource('operators', OperatorsController::class);
        Route::resource('entries', EntriesController::class);
        Route::resource('trips', TripsController::class);
        Route::get('extras/view', [App\Http\Controllers\Backend\Admin\TripsController::class, 'extras_view'])->name('extras.view');
        Route::get('extras/delete', [App\Http\Controllers\Backend\Admin\TripsController::class, 'extras_delete'])->name('extras.delete');
        Route::resource('bookings', BookingsController::class);
        Route::post('/bookings/import', [App\Http\Controllers\Backend\Company\BookingsController::class, 'import'])->name('bookings.import');
        Route::get('sales', [App\Http\Controllers\Backend\Company\BookingsController::class, 'sales'])->name('sales.index');
        Route::get('bookings/data/export', [App\Http\Controllers\Backend\Company\BookingsController::class, 'createPDF'])->name('bookings.export');
        Route::resource('coupons', CouponsController::class);
        //profile controller
        Route::group(['prefix' => 'profile', 'as'=>'profile.'], function () {
            Route::get('/', [ProfileController::class, 'index'])->name('index');
            Route::post('/', [ProfileController::class, 'update'])->name('update');
            Route::post('logout', [ProfileController::class, 'logout'])->name('logout');
        });
    });

});
