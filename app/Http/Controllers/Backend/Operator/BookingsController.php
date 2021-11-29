<?php

namespace App\Http\Controllers\Backend\Operator;

use App\Http\Controllers\Controller;
use App\Events\NewBookingEvent;
use App\Models\User;
use App\Models\Category;
use App\Models\Booking;
use App\Models\Sale;
use App\Models\Trip;
use App\Models\Coupon;
use Illuminate\Http\Request;
use App\Http\Requests\Backend\Operator\Bookings\BookingRequest;
use App\Http\Requests\Backend\BookingImportRequest;
use Illuminate\Support\Facades\DB;
use PDF;
use Auth;

class BookingsController extends Controller
{

    protected $auth_company_roles_ids;

    public $route_path = 'operator.bookings.';

    public function index(Request $request)
    {

        if($request->has('keyword')) {
            $bookings = Booking::paid()
            ->with(['trip', 'category', 'coupon', 'adder'])
            ->whereHas('trip', function($query) {
                $query->operated();
            })
            ->where(function($query) use ($request) {
                $query->orWhere('name', 'like', '%' . $request->keyword . '%');
                $query->orWhere('email', 'like', '%' . $request->keyword . '%');
                $query->orWhere('mobile', 'like', '%' . $request->keyword . '%');
                $query->orWhere('passport', 'like', '%' . $request->keyword . '%');
                $query->orWhere('total_paid', 'like', '%' . $request->keyword . '%');
                $query->orWhere('period', 'like', '%' . $request->keyword . '%');
                $query->orWhere('created_at', 'like', '%' . $request->keyword . '%');
                $query->orWhereHas('trip', function($query) use ($request) {
                    $query->where('code', 'like', '%' . $request->keyword . '%');
                    $query->where('price', 'like', '%' . $request->keyword . '%');
                    $query->where('trip_date', 'like', '%' . $request->keyword . '%');
                    $query->orWhereHas('category', function($query) use ($request) {
                        $query->where('name', 'like', '%' . $request->keyword . '%');
                    });
                    $query->orWhereHas('operator', function($query2) use ($request) {
                        $query2->where('name', 'like', '%' . $request->keyword . '%');
                    });
                });
                $query->orWhereHas('coupon', function($query) use ($request) {
                    $query->where('code', 'like', '%' . $request->keyword . '%');
                    $query->orWhere('discount', 'like', '%' . $request->keyword . '%');
                });
                $query->orWhereHas('entry', function($query) use ($request) {
                    $query->where('name', 'like', '%' . $request->keyword . '%');
                });
                $query->orWhereHas('adder', function($query) use ($request) {
                    $query->where('name', 'like', '%' . $request->keyword . '%');
                });
            })
            ->paginate(10);
        } else {
            $bookings = Booking::paid()
            ->with(['trip', 'category', 'coupon', 'adder'])
            ->where(function($query) use ($request) {
                $query->where('added_by', auth()->user()->id);
                $query->orWhereHas('trip', function($query) {
                    $query->operated();
                });
            })
            ->paginate(10);
        }
        $total_bookings = Booking::paid()
        ->where(function($query) use ($request) {
            $query->where('added_by', auth()->user()->id)->orWhereHas('trip', function($query) {
                $query->operated();
            });
        })
        ->get()->count();
        return view('backend.'.$this->route_path.'index', compact('bookings', 'total_bookings'));
    }

    public function create()
    {
        $trips = Trip::get();
        $categories = Category::where('type', '1')->get();
        return view('backend.'.$this->route_path.'create', compact('trips', 'categories'));
    }

    public function store(BookingRequest $request)
    {
        $trip = Trip::where(['type_id' => 1, 'code' => $request->code])->operated()->first();
        if(!$trip) {
            return redirect()->back()->with('error', 'خطأ في كود الرحلة');
            exit;
        }
        $trip_bookings = Booking::where(['trip_id' => $trip->id, 'payment_status' => 'paid'])->get()->count();
        $available_seets = $trip->capacity-$trip_bookings;
        if($available_seets<1) {
            return redirect()->back()->with('error', 'لا توجد أماكن متاحة');
            exit;
        }
        $members_reference = rand(100000, 999999);
        if(!$trip) {
            return redirect()->back()->with('error', 'خطأ في كود الرحلة!');
            exit;
        }
        $booking = Booking::create([
            'members_reference' => $members_reference,
            'name' => $request->name,
            'email' => $request->email,
            'mobile' => $request->mobile,
            'passport' => $request->passport,
            'trip_id' => $trip->id,
            'category_id' => $trip->type_id,
            'total_paid' => $trip->price,
            'notes' => $request->notes,
            'added_by' => Auth::user()->id,
            'payment_status' => 'paid',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        if($trip->type_id==1) {
            if($trip->status==1) {
                $trip_type = 'عامة';
            } else {
                $trip_type = 'خاصة';
            }
        } else {
            $trip_type = NULL;
        }
        $sale = Sale::create([
            'booking_id' => $booking->id,
            'members_reference' => $members_reference,
            'name' => $request->name,
            'email' => $request->email,
            'mobile' => $request->mobile,
            'passport' => $request->passport,
            'booking_type' => $trip->type_id==1 ? 'رحلة' : 'مخيم',
            'trip_code' => $trip->code,
            'trip_category' => $trip->category->name,
            'trip_type' =>  $trip_type,
            'trip_date' => $trip->type_id==1 ? $trip->trip_date : NULL,
            'trip_price' => $trip->price,
            'operator' => $trip->type_id==1 ? $trip->operator->name.' - #'.$trip->operator->id : NULL,
            'total_paid' => $total_paid,
            'notes' => $request->notes,
            'period' => $period,
            'period_from' => $period_from,
            'period_to' => $period_to,
            'added_by' => Auth::user()->name. ' - #'.Auth::user()->id,
            'payment_status' => 'paid',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        event(new NewBookingEvent($booking));
        return redirect()->route($this->route_path.'index')->with('success', 'تم إضافة الحجز بنجاح!');
    }

    public function import(Request $request)
    {
        if ($file = $request->file('excel_file')) {
           $validator=validator()->make($request->all(),[
             'excel_file'=>'required|max:50000|mimes:xlsx,application/csv,application/excel,
              application/vnd.ms-excel, application/vnd.msexcel,
              text/csv,application/vnd.openxmlformats-officedocument.spreadsheetml.sheet',
           ]);
          if ($validator->fails()) {
             return back()
                        ->with('error', 'هذا الملف غير مسموح به');
           }
            \Maatwebsite\Excel\Facades\Excel::import(new \App\Imports\BookingsImportTrip, $request->file('excel_file'));

            return redirect()->back()->with('success', 'تم إضافة الحجوزات بنجاح!');
        } else {
            return redirect()->back()->with('error', 'خطأ في الملف المرفوع!');
        }
    }

    public function show($id)
    {
        $booking = Booking::paid()->operated()->where(['id' => $id])->firstOrFail();
        return view('backend.'.$this->route_path.'show', compact('booking'));
    }

    public function edit($id)
    {
        $booking = Booking::paid()->where(['id' => $id])->whereHas('trip', function($query) {
            $query->operated();
        })->firstOrFail();
        $operators = User::where('role', 'operator')->get();
        $categories = Category::where('type', '1')->get();
        return view('backend.'.$this->route_path.'edit', compact('booking', 'operators', 'categories'));
    }

    public function update(BookingRequest $request, $id)
    {

        $trip = Trip::where('code', $request->code)->first();
        $total_paid = $trip->price;
        $booking = Booking::paid()->whereId($id)->first();
        if($booking->coupon_id  != NULL) {
            $coupon = Coupon::where(['code' => $booking->coupon_id, 'status' => 1])->first();
            if(!$coupon) {
                return redirect()->back()->with('error', 'خطأ في كود الخصم!');
                exit;
            }
            $total_paid = $trip->price-(($trip->price*$coupon->discount)/100);
        }
        $booking->trip_id = $trip->id;
        $booking->total_paid = $total_paid;
        $booking->updated_at = now();
        $booking->save();
        return redirect()->route($this->route_path.'index')->with('success', 'تم تحديث بيانات الحجز بنجاح!');
    }

    public function destroy($id)
    {
        $booking = Booking::paid()->where(['id' => $id])->whereHas('trip', function($query) {
            $query->operated();
        })->firstOrFail();
        $booking->delete();

        return redirect()->route($this->route_path.'index')->with('success', 'تم حذف الحجز بنجاح!');
    }
}
