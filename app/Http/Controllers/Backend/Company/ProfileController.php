<?php

namespace App\Http\Controllers\Backend\Company;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\CompanyRole;
use Illuminate\Http\Request;
use App\Http\Requests\Backend\Company\Profile\ProfileRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Session ;
use Auth;

class ProfileController extends Controller
{

    public $route_path = 'company.profile.';
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
        return redirect()->route('company.dashboard')->with('success', 'تم تحديث بيانات البروفايل بنجاح!');
    }

    public function logout()
    {
        Auth::logout();
        if(Session::has('login_as') && Session::get('login_as') == "super_admin") {
            Session::forget('login_as');
            return redirect()->route('admin.login');
        } else {
            return redirect()->route('company.login');
        }
    }
}
