<?php

namespace App\Http\Controllers\Backend\Operator;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Category;
use App\Models\Trip;
use Illuminate\Http\Request;
use App\Http\Requests\Backend\Operator\Trips\TripRequest;
use Illuminate\Support\Facades\DB;
use Auth;

class TripsController extends Controller
{

    public $route_path = 'operator.trips.';

    public function index(Request $request)
    {
        if($request->has('code')) {
            $trips = Trip::operated()->where(['type_id' => 1, 'code' => $request->code])->paginate(10);            
        } else {
            $trips = Trip::where('type_id', 1)->operated()->paginate(10);
        }
        return view('backend.'.$this->route_path.'index', compact('trips'));
    }

    public function create()
    {
        $operators = User::where('role', 'operator')->get();
        $categories = Category::where('type', '2')->get();
        return view('backend.'.$this->route_path.'create', compact('operators', 'categories'));
    }

    public function store(TripRequest $request)
    {
        if ($image = $request->file('image')) {
            $image_name = time() . "." . $image->getClientOriginalExtension();
            $image->move(public_path('uploads/trips'), $image_name);
        } else {
            $image_name = "";
        }
        $trip = Trip::insertGetId([
            'code' => $request->code,
            'title' => $request->title,
            'description' => $request->description,
            'capacity' => $request->capacity,
            'price' => $request->price,
            'trip_date' => date("Y-m-d", strtotime($request->trip_date)),
            'type_id' => 1,
            'category_id' => $request->category_id,
            'operator_id' => auth()->user()->id,
            'image' => $image_name,
            'status' => 0,
            'added_by' => Auth::user()->id,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        return redirect()->route($this->route_path.'index')->with('success', 'تم إضافة الرحلة بنجاح!');
    }

    public function show($id)
    {
        $trip = Trip::operated()->where(['id' => $id])->first();
        $operators = User::where('role', 'operator')->get();
        $categories = Category::where('type', '2')->get();
        return view('backend.'.$this->route_path.'show', compact('trip', 'operators', 'categories'));
    }
    public function edit($id)
    {
        $trip = Trip::operated()->where(['id' => $id])->first();
        $operators = User::where('role', 'operator')->get();
        $categories = Category::where('type', '2')->get();
        return view('backend.'.$this->route_path.'edit', compact('trip', 'operators', 'categories'));
    }

    public function update(TripRequest $request, $id)
    {
        $trip = Trip::operated()->whereId($id)->first();
        $trip->code = $request->code;
        $trip->title = $request->title;
        $trip->description = $request->description;
        $trip->capacity = $request->capacity;
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
        return redirect()->route($this->route_path.'index')->with('success', 'تم تحديث الرحلة بنجاح!');
    }

    public function destroy($id)
    {
        $trip = Trip::operated()->whereId($id)->first();
        $trip->delete();

        return redirect()->route($this->route_path.'index')->with('success', 'تم حذف الرحلة بنجاح!');
    }
}
