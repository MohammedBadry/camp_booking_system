<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Events\NewUserEvent;
use Illuminate\Http\Request;
use App\Http\Requests\Backend\Admin\Profile\ProfileRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session ;
use Auth;

class ProfileController extends Controller
{

    public $route_path = 'admin.profile.';

    public function index()
    {
        $admin = User::where(['id' => Auth::user()->id])->first();
        //event(new NewUserEvent($admin, request()));
        return view('backend.'.$this->route_path.'edit', compact('admin'));
    }

    public function update(ProfileRequest $request)
    {
        $admin = User::whereId(Auth::user()->id)->first();
        if($request->password) {
            $admin->password = bcrypt($request->password);
        }
        $admin->name = $request->name;
        $admin->mobile = $request->mobile;
        $admin->email = $request->email;
        if ($image = $request->file('image')) {
            //delete the old image
            if($admin->image!='') {
                ////unlink("uploads/profiles/".$admin->image);
            }
            $image_name = time() . "." . $image->getClientOriginalExtension();
            $image->move(public_path('uploads/profiles'), $image_name);
            $admin->image = $image_name;
        }
        $admin->updated_at = now();
        $admin->save();
        return redirect()->route('admin.dashboard')->with('success', 'تم تحديث بيانات البروفايل بنجاح!');
    }

    public function logout()
    {
        Auth::logout();
        Session::forget('login_as');
        return redirect()->route('admin.login');
    }
}
