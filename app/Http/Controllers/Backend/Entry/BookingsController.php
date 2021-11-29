<?php

namespace App\Http\Controllers\Backend\Entry;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Booking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Auth;

class BookingsController extends Controller
{
    
    public $route_path = 'entry.';

    public function show($id)
    {
        $booking = Booking::where(['id' => $id])->firstOrFail();
        return view('backend.'.$this->route_path.'booking', compact('booking'));
    }

    public function update(Request $request, $id)
    {
        $booking = Booking::whereId($id)->firstOrFail();
        $booking->entry_id = Auth::user()->id;
        $booking->status = '1';
        $booking->updated_at = now();
        $booking->save();
        return redirect()->route($this->route_path.'bookings.success', $booking->id)->with('success', 'تم تحديث بيانات الحجز بنجاح!');
    }

    public function success($id)
    {
        $booking = Booking::where(['id' => $id])->firstOrFail();
        return view('backend.'.$this->route_path.'success', compact('booking'));
    }
}
