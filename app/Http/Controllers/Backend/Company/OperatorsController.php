<?php

namespace App\Http\Controllers\Backend\Company;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Events\NewUserEvent;
use App\Models\CompanyRole;
use Illuminate\Http\Request;
use App\Http\Requests\Backend\Company\Operators\OperatorRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;
use Auth;

class OperatorsController extends Controller
{

    public $route_path = 'company.operators.';
    
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
        if(!in_array(3, $this->auth_company_roles_ids)) {
            return redirect('/company/dashboard')->with('error', 'ليس لديك صلاحية لذلك!');
        }

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
        if(!in_array(3, $this->auth_company_roles_ids)) {
            return redirect('/company/dashboard')->with('error', 'ليس لديك صلاحية لذلك!');
        }

        return view('backend.'.$this->route_path.'create');
    }

    public function store(OperatorRequest $request)
    {
        if(!in_array(3, $this->auth_company_roles_ids)) {
            return redirect('/company/dashboard')->with('error', 'ليس لديك صلاحية لذلك!');
        }
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
        if(!in_array(3, $this->auth_company_roles_ids)) {
            return redirect('/company/dashboard')->with('error', 'ليس لديك صلاحية لذلك!');
        }

        $operator = User::where(['id' => $id])->first();
        return view('backend.'.$this->route_path.'edit', compact('operator'));
    }

    public function update(OperatorRequest $request, $id)
    {
        if(!in_array(3, $this->auth_company_roles_ids)) {
            return redirect('/company/dashboard')->with('error', 'ليس لديك صلاحية لذلك!');
        }

        $operator = User::whereId($id)->first();
        if($request->password) {
            $operator->password = bcrypt($request->password);
        }
        $operator->name = $request->name;
        $operator->mobile = $request->mobile;
        $operator->email = $request->email;
        $operator->details = $request->details;
        if ($image = $request->file('image')) {
            //delete the old image
            if($operator->image!='') {
                //unlink("uploads/profiles/".$operator->image);
            }
            $image_name = time() . "." . $image->getClientOriginalExtension();
            $image->move(public_path('uploads/profiles'), $image_name);
            $operator->image = $image_name;
        }
        $operator->updated_at = now();
        $operator->save();
        return redirect()->route($this->route_path.'index')->with('success', 'تم تحديث بيانات المشغل بنجاح!');
    }

    public function destroy($id)
    {
        if(!in_array(3, $this->auth_company_roles_ids)) {
            return redirect('/company/dashboard')->with('error', 'ليس لديك صلاحية لذلك!');
        }

        $operator = User::whereId($id)->first();
        $operator->delete();

        return redirect()->route($this->route_path.'index')->with('success', 'تم حذف المشغل بنجاح!');
    }
}
