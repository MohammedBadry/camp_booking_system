<?php

namespace App\Http\Controllers\Backend\Company;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Category;
use App\Models\Trip;
use App\Models\CampExtra;
use App\Models\CompanyRole;
use Illuminate\Http\Request;
use App\Http\Requests\Backend\Company\Trips\TripRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;
use Auth;

class TripsController extends Controller
{

    public $route_path = 'company.trips.';
    public $route_path2 = 'company.camps.';

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
        if(!in_array(1, $this->auth_company_roles_ids) && !in_array(6, $this->auth_company_roles_ids)) {
            return redirect('/company/dashboard')->with('error', 'ليس لديك صلاحية لذلك!');
        }

        if($request->has('code')) {
            $trips = Trip::where(['type_id' => $request->type_id, 'code' => $request->code])->paginate(10);
        } else {
            $trips = Trip::where('type_id', $request->type_id)->paginate(10);
        }
        if($request->get('type_id')==1) {
            return view('backend.'.$this->route_path.'index', compact('trips'));
        } else {
            return view('backend.'.$this->route_path2.'index', compact('trips'));
        }
    }

    public function create(Request $request)
    {
        if(!in_array(1, $this->auth_company_roles_ids) && !in_array(6, $this->auth_company_roles_ids)) {
            return redirect('/company/dashboard')->with('error', 'ليس لديك صلاحية لذلك!');
        }

        if($request->get('type_id')==1) {
            $operators = User::where('role', 'operator')->get();
            $categories = Category::where('type', '2')->get();
            return view('backend.'.$this->route_path.'create', compact('operators', 'categories'));
        } else {
            $categories = Category::where('type', '3')->get();
            return view('backend.'.$this->route_path2.'create', compact('categories'));
        }
    }

    public function store(TripRequest $request)
    {
        if(!in_array(1, $this->auth_company_roles_ids) && !in_array(6, $this->auth_company_roles_ids)) {
            return redirect('/company/dashboard')->with('error', 'ليس لديك صلاحية لذلك!');
        }

        if ($image = $request->file('image')) {
            $image_name = time() . "." . $image->getClientOriginalExtension();
            $image->move(public_path('uploads/trips'), $image_name);
        } else {
            $image_name = "";
        }
        if($request->get('type_id')==1) {
            $trip = Trip::insertGetId([
                'code' => $request->code,
                'title' => $request->title,
                'capacity' => $request->capacity,
                'price' => $request->price,
                'trip_date' => date("Y-m-d", strtotime($request->trip_date)),
                'type_id' => $request->type_id,
                'category_id' => $request->category_id,
                'operator_id' => $request->operator_id,
                'image' => $image_name,
                'status' => $request->status,
                'description' => $request->description,
                'added_by' => Auth::user()->id,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
            return redirect('/company/trips/?type_id=1')->with('success', 'تم إضافة الرحلة بنجاح!');
        } else {
            DB::transaction(function() use ($request, $image_name) {
                $trip = Trip::insertGetId([
                    'code' => $request->code,
                    'title' => $request->title,
                    'size' => $request->size,
                    'from' => $request->from,
                    'to' => $request->to,
                    'camps_num' => $request->camps_num,
                    'price' => $request->price,
                    'trip_date' => date("Y-m-d", strtotime($request->trip_date)),
                    'type_id' => $request->type_id,
                    'category_id' => $request->category_id,
                    'image' => $image_name,
                    'description' => $request->description,
                    'added_by' => Auth::user()->id,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
                if($request->extra_name) {
                    for ($i = 0; $i < count($request->extra_name); $i++) {
                        if(!empty(ltrim($request->extra_name[$i])) && !empty(ltrim($request->extra_price[$i])) && !empty(ltrim($request->extra_quantity[$i]))) {
                            CampExtra::create([
                                'name' => $request->extra_name[$i],
                                'price' => $request->extra_price[$i],
                                'quantity' => $request->extra_quantity[$i],
                                'camp_id' => $trip
                            ]);
                        }
                    }
                }
            });
            return redirect('/company/trips/?type_id=2')->with('success', 'تم إضافة المخيم بنجاح!');
        }
    }

    public function show($id, Request $request)
    {
        if(!in_array(1, $this->auth_company_roles_ids) && !in_array(6, $this->auth_company_roles_ids)) {
            return redirect('/company/dashboard')->with('error', 'ليس لديك صلاحية لذلك!');
        }

        $trip = Trip::where(['id' => $id])->first();
        $operators = User::where('role', 'operator')->get();
        $categories = Category::where('type', '2')->get();
        return view('backend.'.$this->route_path.'show', compact('trip', 'operators', 'categories'));
    }
    public function edit($id, Request $request)
    {
        if(!in_array(1, $this->auth_company_roles_ids) && !in_array(6, $this->auth_company_roles_ids)) {
            return redirect('/company/dashboard')->with('error', 'ليس لديك صلاحية لذلك!');
        }

        $trip = Trip::where(['id' => $id])->first();
        if($request->get('type_id')==1) {
            $operators = User::where('role', 'operator')->get();
            $categories = Category::where('type', '2')->get();
            return view('backend.'.$this->route_path.'edit', compact('trip', 'operators', 'categories'));
        } else {
            $categories = Category::where('type', '3')->get();
            return view('backend.'.$this->route_path2.'edit', compact('trip', 'categories'));
        }
    }

    public function update(TripRequest $request, $id)
    {
        if(!in_array(1, $this->auth_company_roles_ids) && !in_array(6, $this->auth_company_roles_ids)) {
            return redirect('/company/dashboard')->with('error', 'ليس لديك صلاحية لذلك!');
        }

        $trip = Trip::whereId($id)->first();
        $trip->code = $request->code;
        $trip->description = $request->description;
        if($request->get('type_id')==1) {
            $trip->capacity = $request->capacity;
            $trip->operator_id = $request->operator_id;
            $trip->status = $request->status;
        } else {
            $trip->size = $request->size;
            $trip->from = $request->from;
            $trip->to = $request->to;
            $trip->camps_num = $request->camps_num;
        }
        $trip->price = $request->price;
        $trip->trip_date = date("Y-m-d", strtotime($request->trip_date));
        $trip->category_id = $request->category_id;
        if ($image = $request->file('image')) {
            //delete the old image
            //unlink("uploads/trips/".$trip->image);
            $image_name = time() . "." . $image->getClientOriginalExtension();
            $image->move(public_path('uploads/trips'), $image_name);
            $trip->image = $image_name;
        }
        $trip->updated_at = now();
        $trip->save();

        if($request->extra_name) {
            for ($i = 0; $i < count($request->extra_name); $i++) {
                if(!empty(ltrim($request->extra_name[$i])) && !empty(ltrim($request->extra_price[$i])) && !empty(ltrim($request->extra_quantity[$i]))) {
                    CampExtra::create([
                        'name' => $request->extra_name[$i],
                        'price' => $request->extra_price[$i],
                        'quantity' => $request->extra_quantity[$i],
                        'camp_id' => $id
                    ]);
                }
            }
        }

        if($request->get('type_id')==1) {
            return redirect('/company/trips/?type_id=1')->with('success', 'تم تحديث الرحلة بنجاح!');
        } else {
            return redirect('/company/trips/?type_id=2')->with('success', 'تم تحديث المخيم بنجاح!');
        }
    }

    public function extras_view(Request $request)
    {
        $extra = CampExtra::whereId($request->id)->first();
        echo $extra->price;
    }

    public function extras_delete(Request $request)
    {
        $extra = CampExtra::whereId($request->id)->first();
        if($extra->delete()) {
            echo $request->id;
        } else {
            echo 0;
        }
    }

    public function destroy($id)
    {
        if(!in_array(1, $this->auth_company_roles_ids) && !in_array(6, $this->auth_company_roles_ids)) {
            return redirect('/company/dashboard')->with('error', 'ليس لديك صلاحية لذلك!');
        }

        $trip = Trip::whereId($id)->first();
        $trip->delete();

        if($request->type_id==1) {
            return redirect('/company/trips/?type_id=1')->with('success', 'تم حذف الرحلة بنجاح!');
        } else {
            return redirect('/company/trips/?type_id=2')->with('success', 'تم حذف المخيم بنجاح!');
        }
    }
}
