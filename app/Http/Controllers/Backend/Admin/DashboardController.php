<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Booking;
use App\Models\Sale;
use App\Models\Setting;

class DashboardController extends Controller
{

    function index() {
        $comapnies = User::with(['roles'])->where('role', 'company')->get();
        $oprators = User::with(['roles'])->where('role', 'operator')->get();
        $sales = Booking::paid()->get();
        $trips_sales = Sale::paid()->where('booking_type', 'رحلة')->paginate(10);
        $camps_sales = Sale::paid()->where('booking_type', 'مخيم')->paginate(10);
        return view('backend.admin.dashboard', compact('comapnies', 'oprators', 'sales', 'trips_sales', 'camps_sales'));
    }

    public function settings()
    {
        $settings = Setting::first();
        return view('backend.admin.settings', compact('settings'));
    }

    public function update_settings(Request $request)
    {
        $settings = Setting::first();
        $settings->king_reserve = $request->king_reserve;
        $settings->terms = $request->terms;
        $settings->facebook = $request->facebook;
        $settings->twitter = $request->twitter;
        $settings->instagram = $request->instagram;
        $settings->snapchat = $request->snapchat;
        $settings->support_email = $request->support_email;
        $settings->updated_at = now();
        $settings->save();
        return redirect()->back()->with('success', 'تم تحديث الإعدادات بنجاح!');
    }
}
