<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Http\Controllers\Controller;
use App\Events\NewUserEvent;
use App\Models\User;
use App\Models\Role;
use App\Models\CompanyRole;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session ;
use App\Http\Requests\Backend\Admin\Companies\CompanyRequest;
use Illuminate\Support\Facades\DB;
use Auth;

class CompaniesController extends Controller
{

    public $route_path = 'admin.companies.';

    public function index(Request $request)
    {
        if($request->has('keyword')) {
            $companies = User::with(['roles'])
            ->where('role', 'company')
            ->where(function($query) use ($request) {
                $query->where('id', 'like', '%' . $request->keyword . '%')
                ->orWhere('name', 'like', '%' . $request->keyword . '%')
                ->orWhere('email', 'like', '%' . $request->keyword . '%')
                ->orWhere('mobile', 'like', '%' . $request->keyword . '%');
                
            })
            ->paginate(10);            
        } else {
            $companies = User::with(['roles'])->where('role', 'company')->paginate(10);
        }
        return view('backend.'.$this->route_path.'index', compact('companies'));
    }

    public function create()
    {
        $roles = Role::orderBy('order', 'asc')->get();
        return view('backend.'.$this->route_path.'create', compact('roles'));
    }

    public function store(CompanyRequest $request)
    {
        DB::transaction(function () use ($request){
            $company = User::create([
                'name' => $request->name,
                'mobile' => $request->mobile,
                'email' => $request->email,
                'password' => bcrypt($request->password),
                'role' => 'company',
                'added_by' => Auth::user()->id,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
            //dd($company);
            foreach($request->roles as $role_id) {
                CompanyRole::create([
                    'user_id' => $company->id,
                    'role_id' => $role_id
                ]);
            }
            event(new NewUserEvent($company, $request));
        });
        return redirect()->route($this->route_path.'index')->with('success', 'تم إضافة المستخدم بنجاح!');
    }

    public function show($id)
    {
        $company = User::where(['id' => $id])->first();
        $roles = Role::orderBy('order', 'asc')->get();
        $company_roles = CompanyRole::where('user_id', $id)->get('role_id');
        $company_role_ids = [];
        foreach($company_roles as $cr) {
            array_push($company_role_ids, $cr->role_id);
        }
        return view('backend.'.$this->route_path.'show', compact('roles', 'company', 'company_role_ids'));
    }
    public function edit($id)
    {
        $company = User::where(['id' => $id])->first();
        $roles = Role::orderBy('order', 'asc')->get();
        $company_roles = CompanyRole::where('user_id', $id)->get('role_id');
        $company_role_ids = [];
        foreach($company_roles as $cr) {
            array_push($company_role_ids, $cr->role_id);
        }
        //dd($company_role_ids);
        return view('backend.'.$this->route_path.'edit', compact('roles', 'company', 'company_role_ids'));
    }

    public function update(CompanyRequest $request, $id)
    {
        $company = User::whereId($id)->first();
        if($request->password) {
            $company->password = bcrypt($request->password);
        }
        $company->name = $request->name;
        $company->mobile = $request->mobile;
        $company->email = $request->email;
        $company->updated_at = now();
        $company->save();
        $company_roles = CompanyRole::where('user_id', $id)->get(['id']);
        CompanyRole::destroy($company_roles->toArray());

        foreach($request->roles as $role_id) {
            CompanyRole::create([
                'user_id' => $id,
                'role_id' => $role_id
            ]);
        }
        return redirect()->route($this->route_path.'index')->with('success', 'تم تحديث بيانات المستخدم بنجاح!');
    }

    public function login_as($id)
    {
        Auth::logout(); // for end current session
        $company = User::whereId($id)->first();
        Auth::login($company);
        Session::put(['login_as' => 'super_admin']);
        return redirect()->route('company.dashboard')->with('success', 'تم تسجيل الدخول كشركة!');
    }

    public function destroy($id)
    {
        $company = User::whereId($id)->first();
        $company_roles = CompanyRole::where('user_id', $id)->get(['id']);
        foreach($company_roles as $cr) {
            $cr->delete();
        }
        $company->delete();

        return redirect()->route($this->route_path.'index')->with('success', 'تم حذف المستخدم بنجاح!');
    }
}
