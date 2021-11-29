<?php

namespace App\Http\Controllers\Backend\Operator;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\Backend\Operator\Profile\ProfileRequest;
use Illuminate\Support\Facades\DB;
use Auth;

class ProfileController extends Controller
{

    public $route_path = 'operator.profile.';

    public function index()
    {
        $admin = User::where(['id' => Auth::user()->id])->first();
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
                //unlink("uploads/profiles/".$admin->image);
            }
            $image_name = time() . "." . $image->getClientOriginalExtension();
            $image->move(public_path('uploads/profiles'), $image_name);
            $admin->image = $image_name;
        }
        $admin->updated_at = now();
        $admin->save();
        return redirect()->route('operator.dashboard')->with('success', 'تم تحديث بيانات البروفايل بنجاح!');
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('operator.login');
    }
}
