<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Events\NewUserEvent;
use Illuminate\Http\Request;
use App\Http\Requests\Backend\Admin\Operators\OperatorRequest;
use Illuminate\Support\Facades\DB;
use Auth;

class OperatorsController extends Controller
{

    public $route_path = 'admin.operators.';

    public function index(Request $request)
    {
        if($request->has('keyword')) {
            $operators = User::with(['operator'])
            ->where('role', 'company')
            ->where(function($query) use ($request) {
                $query->where('id', 'like', '%' . $request->keyword . '%')
                ->orWhere('name', 'like', '%' . $request->keyword . '%')
                ->orWhere('email', 'like', '%' . $request->keyword . '%')
                ->orWhere('mobile', 'like', '%' . $request->keyword . '%');
                
            })
            ->paginate(10);            
        } else {
            $operators = User::where('role', 'operator')->paginate(10);
        }
        return view('backend.'.$this->route_path.'index', compact('operators'));
    }

    public function create()
    {
        return view('backend.'.$this->route_path.'create');
    }

    public function store(OperatorRequest $request)
    {
        if ($image = $request->file('image')) {
            $image_name = time() . "." . $image->getClientOriginalExtension();
            $image->move(public_path('uploads/profiles'), $image_name);
        } else {
            $image_name = "";
        }
        $operator = User::create([
            'name' => $request->name,
            'mobile' => $request->mobile,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'role' => 'operator',
            'details' => $request->details,
            'image' => $image_name,
            'added_by' => Auth::user()->id,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        event(new NewUserEvent($operator, $request));
        return redirect()->route($this->route_path.'index')->with('success', 'تم إضافة المشغل بنجاح!');
    }

    public function show($id)
    {
        $operator = User::where(['id' => $id])->first();
        return view('backend.'.$this->route_path.'show', compact('operator'));
    }
    public function edit($id)
    {
        $operator = User::where(['id' => $id])->first();
        return view('backend.'.$this->route_path.'edit', compact('operator'));
    }

    public function update(OperatorRequest $request, $id)
    {
        $operator = User::whereId($id)->first();
        if($request->password) {
            $operator->password = bcrypt($request->password);
        }
        $operator->name = $request->name;
        $operator->mobile = $request->mobile;
        $operator->email = $request->email;
        if ($image = $request->file('image')) {
            //delete the old image
            if($operator->image!='') {
                //unlink("uploads/profiles/".$operator->image);
            }
            $image_name = time() . "." . $image->getClientOriginalExtension();
            $image->move(public_path('uploads/profiles'), $image_name);
            $operator->image = $image_name;
        }
        $operator->details = $request->details;
        $operator->updated_at = now();
        $operator->save();
        return redirect()->route($this->route_path.'index')->with('success', 'تم تحديث بيانات المشغل بنجاح!');
    }

    public function destroy($id)
    {
        $operator = User::whereId($id)->first();
        $operator->delete();

        return redirect()->route($this->route_path.'index')->with('success', 'تم حذف المشغل بنجاح!');
    }
}
