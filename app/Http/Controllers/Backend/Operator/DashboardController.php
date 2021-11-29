<?php

namespace App\Http\Controllers\Backend\Operator;

use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Trip;
use App\Models\Booking;
use App\Models\Sale;

class DashboardController extends Controller
{
    
    function index() {
        $trips = Trip::operated()->get();
        $bookings = Booking::paid()->with(['trip', 'category', 'coupon', 'adder'])->whereHas('trip', function($query) {
            $query->operated();
        })->paginate(10);
        /*
        $bookings = Sale::paid()->paginate(10)->whereHas('trip', function($query) {
            $query->operated();
        })->paginate(10);
        */
        return view('backend.operator.dashboard', compact('trips', 'bookings'));
    }
}
