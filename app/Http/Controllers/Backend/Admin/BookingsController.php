<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Http\Controllers\Controller;
use App\Events\NewBookingEvent;
use App\Models\User;
use App\Models\Category;
use App\Models\Booking;
use App\Models\Sale;
use App\Models\Trip;
use App\Models\Coupon;
use Illuminate\Http\Request;
use App\Http\Requests\Backend\Admin\Bookings\BookingRequest;
use App\Http\Requests\Backend\BookingImportRequest;
use Illuminate\Support\Facades\DB;
use App\Exports\BookingsExport;
use PDF;
use Auth;

class BookingsController extends Controller
{

    public $route_path = 'admin.bookings.';

    public function index(Request $request)
    {
        if($request->has('keyword')) {
            $bookings = Booking::paid()
            ->with(['trip', 'category', 'coupon', 'adder'])
            ->where(function($query) use ($request) {
                $query->where('id', 'like', '%' . $request->keyword . '%');
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
                    $query->orWhereHas('operator', function($query) use ($request) {
                        $query->where('name', 'like', '%' . $request->keyword . '%');
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
            ->paginate(10);
        }
        $total_bookings = Booking::paid()->get()->count();
        return view('backend.'.$this->route_path.'index', compact('bookings', 'total_bookings'));
    }

    public function sales(Request $request)
    {
        if($request->has('keyword')) {
            $sales = Sale::paid()
            ->where(function($query) use ($request) {
                $query->where('id', 'like', '%' . $request->keyword . '%');
                $query->orWhere('name', 'like', '%' . $request->keyword . '%');
                $query->orWhere('email', 'like', '%' . $request->keyword . '%');
                $query->orWhere('mobile', 'like', '%' . $request->keyword . '%');
                $query->orWhere('passport', 'like', '%' . $request->keyword . '%');
                $query->orWhere('booking_type', 'like', '%' . $request->keyword . '%');
                $query->orWhere('trip_code', 'like', '%' . $request->keyword . '%');
                $query->orWhere('trip_category', 'like', '%' . $request->keyword . '%');
                $query->orWhere('trip_type', 'like', '%' . $request->keyword . '%');
                $query->orWhere('trip_date', 'like', '%' . $request->keyword . '%');
                $query->orWhere('trip_price', 'like', '%' . $request->keyword . '%');
                $query->orWhere('operator', 'like', '%' . $request->keyword . '%');
                $query->orWhere('total_paid', 'like', '%' . $request->keyword . '%');
                $query->orWhere('notes', 'like', '%' . $request->keyword . '%');
                $query->orWhere('period', 'like', '%' . $request->keyword . '%');
                $query->orWhere('added_by', 'like', '%' . $request->keyword . '%');
            })
            ->paginate(20);
        } else {
            $sales = Sale::paid()->paginate(20);
        }
        $total_sales = Sale::paid()->get()->sum('total_paid');
        return view('backend.'.$this->route_path.'sales', compact('sales', 'total_sales'));
    }

    // Generate PDF
    public function createPDF() {

        return (new BookingsExport)->download('Bookings.xlsx');
        /*
        $bookings = Booking::paid()->get();
        view()->share('bookings',$bookings);
        PDF::setOptions(['dpi' => 150, 'defaultFont' => 'sans-serif']);
        $pdf = PDF::loadView('backend.'.$this->route_path.'.pdf_view', $bookings);

        return $pdf->download('pdf_file.pdf');
        */
    }

    public function create()
    {
        $trips = Trip::get();
        $categories = Category::where('type', '1')->get();
        return view('backend.'.$this->route_path.'create', compact('trips', 'categories'));
    }

    public function test(Request $request)
    {
        /*
        $time1 = strtotime('2021-11-20');
        $time2 = strtotime('2021-11-25');
        echo floor( ($time2-$time1) /(60*60*24));
        */

        $period = '2021/11/11 - 2021/11/13';
        $sep_period = explode('-', $period);
        $period_from = $sep_period[0];
        $period_to = $sep_period[1];
        $trip = Trip::where('code', 'C001')->first();
        $trip_bookings = Booking::where(['trip_id' => $trip->id, 'category_id' => 2, 'payment_status' => 'paid'])
        ->where(function ($query) use ($period_from, $period_to) {
            $query->where(function ($query) use ($period_from) {
                $query->where('period_from', '<=', $period_from)
                    ->where('period_to', '>=', $period_from);
            })
            ->orWhere(function ($query) use ($period_to) {
                $query->where('period_from', '<=', $period_to)
                    ->where('period_to', '>=', $period_to);
            });
        })
        ->get()->count();
        $available_seets = $trip->camps_num-$trip_bookings;
        $total_paid = $trip->price*$request->days;
        echo $trip->camps_num."<br>";
        echo $trip_bookings."<br>";
        echo $available_seets."<br>";
        if($available_seets<1) {
            echo 'لا توجد أماكن متاحة';
        }

    }

    public function store(BookingRequest $request)
    {
        $trip = Trip::where('code', $request->code)->first();
        if($trip->type_id==1) {
            $trip_bookings = Booking::where(['trip_id' => $trip->id, 'category_id' => 1, 'payment_status' => 'paid'])->get()->count();
            $available_seets = $trip->capacity-$trip_bookings;
            $total_paid = $trip->price;
            $period = NULL;
            $period_from = NULL;
            $period_to = NULL;
        } else {
            $period = $request->period;
            $sep_period = explode('-', $period);
            $period_from = $sep_period[0];
            $period_to = $sep_period[1];
            $trip_bookings = Booking::where(['trip_id' => $trip->id, 'category_id' => 2, 'payment_status' => 'paid'])
            ->where(function ($query) use ($period_from, $period_to) {
                $query->where(function ($query) use ($period_from) {
                    $query->where('period_from', '<=', $period_from)
                        ->where('period_to', '>=', $period_from);
                })
                ->orWhere(function ($query) use ($period_to) {
                    $query->where('period_from', '<=', $period_to)
                        ->where('period_to', '>=', $period_to);
                });
            })
            ->get()->count();
            $available_seets = $trip->camps_num-$trip_bookings;
            $total_paid = $trip->price*$request->days;
        }
        if($available_seets<1) {
            return redirect()->back()->with('error', 'لا توجد أماكن متاحة');
            exit;
        }
        $members_reference = rand(100000, 999999);
        $booking = Booking::create([
            'members_reference' => $members_reference,
            'name' => $request->name,
            'email' => $request->email,
            'mobile' => $request->mobile,
            'passport' => $request->passport,
            'trip_id' => $trip->id,
            'category_id' => $trip->type_id,
            'total_paid' => $total_paid,
            'notes' => $request->notes,
            'period' => $period,
            'period_from' => $period_from,
            'period_to' => $period_to,
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
           if($request->type==1) {
                \Maatwebsite\Excel\Facades\Excel::import(new \App\Imports\BookingsImportTrip, $request->file('excel_file'));
           } else {
                \Maatwebsite\Excel\Facades\Excel::import(new \App\Imports\BookingsImportCamp, $request->file('excel_file'));
           }

            return redirect()->back()->with('success', 'تم إضافة الحجوزات بنجاح!');
        } else {
            return redirect()->back()->with('error', 'خطأ في الملف المرفوع!');
        }
    }

    public function show($id)
    {
        $booking = Booking::paid()->where(['id' => $id])->first();
        return view('backend.'.$this->route_path.'show', compact('booking'));
    }

    public function edit($id)
    {
        $booking = Booking::paid()->where(['id' => $id])->first();
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
        $booking = Booking::paid()->whereId($id)->first();
        $booking->delete();

        return redirect()->route($this->route_path.'index')->with('success', 'تم حذف الحجز بنجاح!');
    }
}
