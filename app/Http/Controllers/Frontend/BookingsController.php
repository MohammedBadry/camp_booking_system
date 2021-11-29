<?php

namespace App\Http\Controllers\Frontend;


use App\Http\Controllers\Controller;
use App\Events\NewBookingEvent;
use App\Models\User;
use App\Models\Category;
use App\Models\Booking;
use App\Models\Sale;
use App\Models\Trip;
use App\Models\Coupon;
use Illuminate\Http\Request;
use App\Http\Requests\Frontend\Bookings\BookingRequest;
use Illuminate\Support\Facades\Session ;
use Illuminate\Support\Facades\DB;
use PDF;

class BookingsController extends Controller
{
    public function generate_invoice($id)
    {
        $booking = Booking::where(['id' => $id])->firstOrFail();
        if($booking->category_id==1) {
            return view('invoice', compact('booking'));
        } else {
            return view('invoice-camp', compact('booking'));
        }
        /*
        $pdf = PDF::loadView('invoice', compact('booking'));
        return $pdf->download('Ticket-'.$booking->id . '.pdf');
        */
    }

    public function apply_coupon(Request $request)
    {
        if(Session::has('discount')) {
            echo -1;
        } else {
            $coupon = Coupon::where(['code' => $request->coupon_code, 'trip_type' => $request->trip_type, 'status' => 1])->first();
            if($coupon) {
                Session::put(['coupon_code' => $coupon->code, 'discount' => $coupon->discount, 'coupon_trip_id' => $request->coupon_trip_id]);
                echo $coupon->discount;
            } else {
                echo 0;
            }
        }
    }
    public function store(BookingRequest $request, $trip_id)
    {
        if($request->members>100) {
            return redirect()->back()->with('error', 'لا يمكن التسجيل لأكثر من 100 شخص في المرة الواحدة');
            exit;
        }
        $trip = Trip::where('id', $trip_id)->first();
        if($trip->type_id==1) {
            $trip_bookings = Booking::where(['trip_id' => $trip_id, 'category_id' => 1, 'payment_status' => 'paid'])->get()->count();
            $available_seets = $trip->capacity-$trip_bookings;
            $period = NULL;
            $period_from = NULL;
            $period_to = NULL;
            if($request->members>$available_seets) {
                if($request->members>1) {
                    return redirect()->back()->with('error', 'عدد الأماكن المتاحة أقل من العدد المراد الحجز لهم');
                } else {
                    return redirect()->back()->with('error', 'لا توجد أماكن متاحة');
                }
                exit;
            }
        } else {
            $period = $request->trip_date;
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
            if($available_seets<1) {
                return redirect()->back()->with('error', 'لا توجد أماكن متاحة');
                exit;
            }
        }
        $members_reference = rand(100000, 999999);
        for ($i=0; $i <$request->members ; $i++) {
            if(Session::has('discount')) {
                $total_paid = $request->hole_paid;

                $coupon = Coupon::where(['code' => Session::get('coupon_code'), 'status' => 1])->first();
                $coupon_id = $coupon->id;
            } else {
                $total_paid = $request->hole_paid;
                $coupon_id = NULL;
            }
            $booking[$i] = Booking::create([
                'members_reference' => $members_reference,
                'name' => $request['name'][$i],
                'email' => $request['email'][$i],
                'mobile' => $request['mobile'][$i],
                'passport' => $request['passport'][$i],
                'trip_id' => $trip->id,
                'category_id' => $trip->type_id,
                'coupon_id' => $coupon_id,
                'total_paid' => $total_paid,
                'notes' => $request['notes'][$i],
                'period' => $period,
                'period_from' => $period_from,
                'period_to' => $period_to,
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
            if($request->extra_id) {
                for ($x = 0; $x < count($request->extra_id); $x++) {
                    \App\Models\BookingExtra::create([
                        'booking_id' => $booking[$i]->id,
                        'extra_id' => $request->extra_id[$x]
                    ]);
                }
            }
            $sale = Sale::create([
                'booking_id' => $booking[$i]->id,
                'members_reference' => $members_reference,
                'name' => $request['name'][$i],
                'email' => $request['email'][$i],
                'mobile' => $request['mobile'][$i],
                'passport' => $request['passport'][$i],
                'booking_type' => $trip->type_id==1 ? 'رحلة' : 'مخيم',
                'trip_code' => $trip->code,
                'trip_category' => $trip->category->name,
                'trip_type' =>  $trip_type,
                'trip_date' => $trip->type_id==1 ? $trip->trip_date : NULL,
                'trip_price' => $trip->price,
                'operator' => $trip->type_id==1 ? $trip->operator->name.' - #'.$trip->operator->id : NULL,
                'total_paid' => $total_paid,
                'notes' => $request['notes'][$i],
                'period' => $period,
                'period_from' => $period_from,
                'period_to' => $period_to,
                'payment_status' => 'pending',
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

        if(Session::has('discount')) {
            Session::forget('coupon_id');
            Session::forget('discount');
            Session::forget('coupon_trip_id');
            $coupon = Coupon::where(['code' => Session::get('coupon_code'), 'status' => 1])->first();
            $coupon->status = 0;
            $coupon->save();
        }
        //$hole_paid = $request->hole_paid;
        $request->type_id = $trip->type_id;
        return $this->pay($members_reference, $request);
        //return redirect()->route('frontend.book-info', ['members_reference' => $members_reference])->with("success", "تم الحجز بنجاح");
    }

    public function pay($members_reference, Request $request) {
        if($request->type_id==1) {
           $client = new \Paylink\Client([
                'vendorId'  =>  config('settings.paylink_vendor_id_trips'),
                'vendorSecret'  =>  config('settings.paylink_vendor_secret_trips'),
                'persistToken'  =>  true, // false by default if not given
                'environment'  =>  config('settings.paylink_environment_trips'), // testing by default if not given
            ]);
        } else {
           $client = new \Paylink\Client([
                'vendorId'  =>  config('settings.paylink_vendor_id_camps'),
                'vendorSecret'  =>  config('settings.paylink_vendor_secret_camps'),
                'persistToken'  =>  true, // false by default if not given
                'environment'  =>  config('settings.paylink_environment_camps'), // testing by default if not given
            ]);
        }
        $data = [
            'amount' => $request->hole_paid,
            'callBackUrl' => url('/bookings/booking-action/?members_reference='.$members_reference),
            'clientEmail' => $request['email'][0],
            'clientMobile' => $request['mobile'][0],
            'clientName' => $request['name'][0],
            'note' => 'This invoice is for order: '.$members_reference,
            'orderNumber' => $members_reference,
        ];


        $response = $client->createInvoice($data);
        // Get the invoice url from the response => $response['url']
        return redirect($response['url']);
     }

    public function booking_action(Request $request) {
        $booking_type = Booking::where(['members_reference' => $request->members_reference])->first();
        if($booking_type->category_id==1) {
            $client = new \Paylink\Client([
                'vendorId'  =>  config('settings.paylink_vendor_id_trips'),
                'vendorSecret'  =>  config('settings.paylink_vendor_secret_trips'),
                'persistToken'  =>  true, // false by default if not given
                'environment'  =>  config('settings.paylink_environment_trips'), // testing by default if not given
            ]);
        } else {
            $client = new \Paylink\Client([
                'vendorId'  =>  config('settings.paylink_vendor_id_camps'),
                'vendorSecret'  =>  config('settings.paylink_vendor_secret_camps'),
                'persistToken'  =>  true, // false by default if not given
                'environment'  =>  config('settings.paylink_environment_camps'), // testing by default if not given
            ]);
        }
        $response = $client->getInvoice($request->transactionNo);

        if($response['orderStatus']=="Paid"){
            $bookings = Booking::where(['payment_id' => NULL, 'members_reference' => $request->members_reference])
            ->update([
                'payment_status' => 'paid',
                'payment_id' => $request->transactionNo,
            ]);
            $sales = Sale::where(['members_reference' => $request->members_reference])
            ->update([
                'payment_status' => 'paid',
            ]);
                //send ticket
                $paid_bookings = Booking::where(['payment_status' => 'paid', 'members_reference' => $request->members_reference])->get();
                foreach($paid_bookings as $p_book) {
                    event(new NewBookingEvent($p_book));
                }

            //redirect with success message
            return redirect()->route('frontend.book-info', ['members_reference' => $request->members_reference])->with("success", "تم الحجز بنجاح");
        }else{
            $bookings = Booking::where(['payment_id' => NULL, 'members_reference' => $request->members_reference])
            ->update([
                'payment_status' => 'failed',
                'payment_id' => $request->transactionNo,
            ]);
            $sales = Sale::where(['members_reference' => $request->members_reference])
            ->update([
                'payment_status' => 'failed',
            ]);
            //redirect with error message
            return redirect('/')->with("error", "فشل عملية الدفع يرجى المحاولة مرة أخرى");
        }
    }
}
