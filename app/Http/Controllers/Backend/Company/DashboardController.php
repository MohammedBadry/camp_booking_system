<?php

namespace App\Http\Controllers\Backend\Company;

use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Trip;
use App\Models\CompanyRole;
use App\Models\Booking;
use App\Models\Sale;
use Illuminate\Support\Facades\View;
use Auth;

class DashboardController extends Controller
{

    protected $user;
    protected $auth_company_roles_ids;

    public function __construct(Request $request) {

        $this->middleware('auth');
        $this->middleware(function ($request, $next) {
            $this->user = Auth::user();
            $auth_company_roles = CompanyRole::where('user_id', $this->user->id)->get('role_id');
            $this->auth_company_roles_ids = [];
            foreach($auth_company_roles as $cr) {
                array_push($this->auth_company_roles_ids, $cr->role_id);
            }
            View::share('auth_company_roles_ids', $this->auth_company_roles_ids);

            return $next($request);
        });

    }

    function index() {
        $trips = Trip::get();
        $oprators = User::with(['roles'])->where('role', 'operator')->get();
        $sales = Booking::paid()->get();
        $trips_sales = Sale::paid()->where('booking_type', 'رحلة')->paginate(10);
        $camps_sales = Sale::paid()->where('booking_type', 'مخيم')->paginate(10);
        return view('backend.company.dashboard', compact('trips', 'oprators', 'sales', 'trips_sales', 'camps_sales'));
    }
}
