<?php

namespace App\Http\Controllers\Backend\Company;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Coupon;
use App\Models\CompanyRole;
use Illuminate\Http\Request;
use App\Http\Requests\Backend\Company\Coupons\CouponRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;
use Auth;

class CouponsController extends Controller
{

    public $route_path = 'company.coupons.';
    
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

    public function index(Request $request)
    {
        if(!in_array(5, $this->auth_company_roles_ids)) {
            return redirect('/company/dashboard')->with('error', 'ليس لديك صلاحية لذلك!');
        }

        if($request->has('code')) {
            $coupons = Coupon::where(['code' => $request->code])->paginate(10);            
        } else {
            $coupons = Coupon::paginate(10);
        }
        return view('backend.'.$this->route_path.'index', compact('coupons'));
    }

    public function create()
    {
        if(!in_array(5, $this->auth_company_roles_ids)) {
            return redirect('/company/dashboard')->with('error', 'ليس لديك صلاحية لذلك!');
        }
        return view('backend.'.$this->route_path.'create');
    }

    public function store(couponRequest $request)
    {
        if(!in_array(5, $this->auth_company_roles_ids)) {
            return redirect('/company/dashboard')->with('error', 'ليس لديك صلاحية لذلك!');
        }
        $coupon = Coupon::insertGetId([
            'code' => $request->code,
            'discount' => $request->discount,
            'type' => '%',
            'expire_date' => date("Y-m-d", strtotime($request->expire_date)),
            'status' => $request->status,
            'trip_type' => $request->trip_type,
            'added_by' => Auth::user()->id,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        return redirect()->route($this->route_path.'index')->with('success', 'تم إضافة كود الخصم بنجاح!');
    }

    public function edit($id)
    {
        if(!in_array(5, $this->auth_company_roles_ids)) {
            return redirect('/company/dashboard')->with('error', 'ليس لديك صلاحية لذلك!');
        }
        $coupon = Coupon::where(['id' => $id])->first();
        return view('backend.'.$this->route_path.'edit', compact('coupon'));
    }

    public function update(couponRequest $request, $id)
    {
        if(!in_array(5, $this->auth_company_roles_ids)) {
            return redirect('/company/dashboard')->with('error', 'ليس لديك صلاحية لذلك!');
        }
        $coupon = Coupon::whereId($id)->first();
        $coupon->code = $request->code;
        $coupon->discount = $request->discount;
        $coupon->expire_date = date("Y-m-d", strtotime($request->expire_date));
        $coupon->status = $request->status;
        $coupon->trip_type = $request->trip_type;
        $coupon->updated_at = now();
        $coupon->save();
        return redirect()->route($this->route_path.'index')->with('success', 'تم تحديث كود الخصم بنجاح!');
    }

    public function destroy($id)
    {
        if(!in_array(5, $this->auth_company_roles_ids)) {
            return redirect('/company/dashboard')->with('error', 'ليس لديك صلاحية لذلك!');
        }
        $coupon = Coupon::whereId($id)->first();
        $coupon->delete();

        return redirect()->route($this->route_path.'index')->with('success', 'تم حذف كود الخصم بنجاح!');
    }
}
