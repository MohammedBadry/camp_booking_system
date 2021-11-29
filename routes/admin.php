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
use App\Http\Controllers\Backend\Admin\DashboardController;
use App\Http\Controllers\Backend\Admin\ProfileController;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

Route::group(['namespace' => 'App\Http\Controllers\Backend'], function () {

    Route::get('/', function (){
        return redirect()->route('admin.login');
    });

    Route::get('test', [\App\Http\Controllers\Backend\Admin\BookingsController::class, 'test']);

    /*authentication*/
    Route::group(['namespace' => 'Auth', 'as'=>'admin.'], function () {
        require __DIR__.'/auth.php';
    });
    Route::get('cache', function() {
        \Artisan::call('config:clear');
        \Artisan::call('cache:clear');
        \Artisan::call('view:clear');
        \Artisan::call('route:clear');
    });

    /*authenticated*/
    Route::group(['namespace' => 'Admin', 'middleware' => ['admin'], 'as'=>'admin.'], function () {
        Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
        Route::resource('companies', CompaniesController::class);
        Route::get('companies/{id}/login-as', [App\Http\Controllers\Backend\Admin\CompaniesController::class, 'login_as'])->name('companies.login-as');
        Route::resource('operators', OperatorsController::class);
        Route::resource('entries', EntriesController::class);
        Route::resource('trips', TripsController::class);
        Route::get('extras/view', [App\Http\Controllers\Backend\Admin\TripsController::class, 'extras_view'])->name('extras.view');
        Route::get('extras/delete', [App\Http\Controllers\Backend\Admin\TripsController::class, 'extras_delete'])->name('extras.delete');
        Route::resource('bookings', BookingsController::class);
        Route::post('bookings/import', [App\Http\Controllers\Backend\Admin\BookingsController::class, 'import'])->name('bookings.import');
        Route::get('sales', [App\Http\Controllers\Backend\Admin\BookingsController::class, 'sales'])->name('sales.index');
        Route::get('bookings/data/export', [App\Http\Controllers\Backend\Admin\BookingsController::class, 'createPDF'])->name('bookings.export');
        Route::resource('coupons', CouponsController::class);
        //profile controller
        Route::group(['prefix' => 'profile', 'as'=>'profile.'], function () {
            Route::get('/', [ProfileController::class, 'index'])->name('index');
            Route::post('/', [ProfileController::class, 'update'])->name('update');
            Route::post('logout', [ProfileController::class, 'logout'])->name('logout');
        });
        Route::group(['prefix' => 'settings', 'as'=>'settings.'], function () {
            Route::get('/', [DashboardController::class, 'settings'])->name('index');
            Route::post('/', [DashboardController::class, 'update_settings'])->name('update');
        });
    });

});
