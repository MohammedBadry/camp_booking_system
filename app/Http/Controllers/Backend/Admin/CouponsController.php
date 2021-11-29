<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Coupon;
use Illuminate\Http\Request;
use App\Http\Requests\Backend\Admin\Coupons\CouponRequest;
use Illuminate\Support\Facades\DB;
use Auth;

class CouponsController extends Controller
{

    public $route_path = 'admin.coupons.';

    public function index(Request $request)
    {
        if($request->has('code')) {
            $coupons = Coupon::where(['code' => $request->code])->paginate(10);            
        } else {
            $coupons = Coupon::paginate(10);
        }
        return view('backend.'.$this->route_path.'index', compact('coupons'));
    }

    public function create()
    {
        return view('backend.'.$this->route_path.'create');
    }

    public function store(couponRequest $request)
    {
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

    public function show($id)
    {
    }
    public function edit($id)
    {
        $coupon = Coupon::where(['id' => $id])->first();
        return view('backend.'.$this->route_path.'edit', compact('coupon'));
    }

    public function update(couponRequest $request, $id)
    {
        $coupon = Coupon::whereId($id)->first();
        $coupon->code = $request->code;
        $coupon->discount = $request->discount;
        $coupon->expire_date = date("Y-m-d", strtotime($request->expire_date));
        $coupon->trip_type = $request->trip_type;
        $coupon->updated_at = now();
        $coupon->save();
        return redirect()->route($this->route_path.'index')->with('success', 'تم تحديث كود الخصم بنجاح!');
    }

    public function destroy($id)
    {
        $coupon = Coupon::whereId($id)->first();
        $coupon->delete();

        return redirect()->route($this->route_path.'index')->with('success', 'تم حذف كود الخصم بنجاح!');
    }
}
