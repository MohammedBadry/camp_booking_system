<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Trip;
use App\Models\User;
use App\Models\Setting;
use App\Mail\NewDesign as NewDesignEmail;
use App\Mail\NewContact as NewContactEmail;
use App\Http\Requests\Frontend\ContactRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;

class HomeController extends Controller
{
    public $route_path = 'frontend';

    public function index()
    {
        $categories = Category::get();
        $hike_trips = Trip::with('category')->where('status', 1)->where('trip_date', '>=', date('Y-m-d'))->whereHas('category', function($query) {
            $query->where('name', 'هايك')
            ->orWhere('name', 'هايك ومخيم');
        })->get();
        $bike_trips = Trip::with('category')->where('status', 1)->where('trip_date', '>=', date('Y-m-d'))->whereHas('category', function($query) {
            $query->where('name', 'بايك')
            ->orWhere('name', 'بايك ومخيم');
        })->get();
        return view($this->route_path.'.index', compact('bike_trips', 'hike_trips', 'categories'));
    }

    public function camps()
    {
        $categories = Category::get();
        $hike_trips = Trip::with('category')->where('status', 1)->whereHas('category', function($query) {
            $query->where('name', 'عوائل');
        })->get();
        $bike_trips = Trip::with('category')->where('status', 1)->whereHas('category', function($query) {
            $query->where('name', 'أفراد');
        })->get();
        return view($this->route_path.'.camps', compact('bike_trips', 'hike_trips', 'categories'));
    }

    public function extras (Request $request) {
        if(!$request->has('camp_id')) {
            echo "Missed Data";
            exit;
        }
        $check_extras = \App\Models\CampExtra::where('camp_id', $request->camp_id)->get();
        if($check_extras->count()<1) {
            echo "[]";
            exit;
        }
        $data[] = '';
        $period = $request->trip_date;
        $sep_period = explode('-', $period);
        $period_from = $sep_period[0];
        $period_to = $sep_period[1];
        foreach ($check_extras as $bex) {
            $test = \App\Models\BookingExtra::where('extra_id', $bex->id)
            ->whereHas('booking', function ($query) use ($period_from, $period_to) {
                $query->where(function ($query) use ($period_from) {
                    $query->where('period_from', '<=', $period_from)
                        ->where('period_to', '>=', $period_from)
                        ->where('payment_status', 'paid');
                })
                ->orWhere(function ($query) use ($period_to) {
                    $query->where('period_from', '<=', $period_to)
                        ->where('period_to', '>=', $period_to)
                        ->where('payment_status', 'paid');
                });
            })
            ->count();
            if($test==$bex->quantity) {
                $data[] = $bex->id;
            }
        }
        $extras = \App\Models\CampExtra::where('camp_id', $request->camp_id)
        ->whereNotIn('id', $data)
        ->get();

        foreach($extras as $item) {
            echo '<tr id="extra-'.$item->id.'" onclick="add('.$item->id.')">
                <td>
                    <p class="table-td ">
                        <span class="table-val">
                        '.$item->name.'
                        ('.$item->price.' ريال)
                        </span>
                        <span class="val-action d-none">
                            <i class="fas fa-times"></i>
                        </span>
                    </p>   
                </td>
            </tr>';
        }
    }

    public function extra_remove(Request $request)
    {
        $extra = \App\Models\CampExtra::whereId($request->id)->first();
        return [
            'price' => $extra->price,
            'text' => '<tr id="extra-'.$extra->id.'" onclick="add('.$extra->id.')"><td><p class="table-td "><span class="table-val">'.$extra->name.'('.$extra->price.' ريال)</span><span class="val-action d-none"><i class="fas fa-times"></i></span></p"></td></tr>'
        ];
    }

    public function extra_add(Request $request)
    {
        $extra = \App\Models\CampExtra::whereId($request->id)->first();
        return [
            'price' => $extra->price,
            'text' => '<span id="extra-'.$extra->id.'" onclick="remove('.$extra->id.')"> '.$extra->name.'('.$extra->price.' ريال) <span class="val-action"><i class="fas fa-times"></i></span> <input class="classs-'.$extra->id.'" type="hidden" name="extra_id[]" value="'.$extra->id.'"> </span>'
        ];
    }

    public function book_info($members_reference)
    {
        $bookings = \App\Models\Booking::where('members_reference', $members_reference)->get();
        return view($this->route_path.'.book-info', compact('bookings'));
    }

    public function operators()
    {
        $operators = User::where('role', 'operator')->get();
        return view($this->route_path.'.operators', compact('operators'));
    }

    public function operator($id)
    {
        $operator = User::find($id);
        return view($this->route_path.'.operator-details', compact('operator'));
    }

    public function king_reserve()
    {
        $settings = Setting::first();
        return view($this->route_path.'.king-reserve', compact('settings'));
    }

    public function about_us()
    {
        $settings = Setting::first();
        return view($this->route_path.'.about-us', compact('settings'));
    }

    public function make_trip()
    {
        return view($this->route_path.'.make-trip');
    }

    public function send_trip_design_request(ContactRequest $request)
    {
        $settings = Setting::first();
        Mail::to($settings->support_email)->send(new NewDesignEmail($request));
        return redirect()->back()->with('success', 'تم إرسال طلبك بنجاح');
    }

    public function contact_us()
    {
        $settings = Setting::first();
        return view($this->route_path.'.contact-us', compact('settings'));
    }

    public function send_request(ContactRequest $request)
    {
        $settings = Setting::first();
        Mail::to($settings->support_email)->send(new NewContactEmail($request));
        return redirect()->back()->with('success', 'تم إرسال طلبك بنجاح');
    }

    public function show_trip($id)
    {
        $trip = Trip::find($id);
        return view($this->route_path.'.show-trip', compact('trip'));
    }

    public function show_camp($id)
    {
        $trip = Trip::find($id);
        return view($this->route_path.'.show-camp', compact('trip'));
    }

    public function book_trip($id)
    {
        //dd(DB::table('booking_extras')->select('extra_id')->get()->toArray());
        $trip = Trip::find($id);
        $settings = Setting::first();

        if(Session::has('discount') && Session::get('coupon_trip_id') != $id) {
            Session::forget('coupon_id');
            Session::forget('discount');
            Session::forget('coupon_trip_id');
        }
        if($trip->type_id==1) {
            return view($this->route_path.'.book-trip', compact('trip', 'settings'));
        } else {

            return view($this->route_path.'.book-camp', compact('trip', 'settings'));
        }
    }

    public function terms($id)
    {
        $settings = Setting::first();
        $trip = Trip::find($id);
        return view($this->route_path.'.terms', compact('settings', 'trip'));
    }
}
