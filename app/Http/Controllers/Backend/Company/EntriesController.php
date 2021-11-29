<?php

namespace App\Http\Controllers\Backend\Company;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Events\NewUserEvent;
use App\Models\CompanyRole;
use Illuminate\Http\Request;
use App\Http\Requests\Backend\Company\Entries\EntryRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;
use Auth;

class EntriesController extends Controller
{

    public $route_path = 'company.entries.';    
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
        if(!in_array(4, $this->auth_company_roles_ids)) {
            return redirect('/company/dashboard')->with('error', 'ليس لديك صلاحية لذلك!');
        }

        if($request->has('keyword')) {
            $entries = User::with(['roles'])
            ->where('role', 'entry')
            ->where(function($query) use ($request) {
                $query->where('id', 'like', '%' . $request->keyword . '%')
                ->orWhere('name', 'like', '%' . $request->keyword . '%')
                ->orWhere('email', 'like', '%' . $request->keyword . '%')
                ->orWhere('mobile', 'like', '%' . $request->keyword . '%');
                
            })
            ->paginate(10);            
        } else {
            $entries = User::where('role', 'entry')->paginate(10);
        }
        return view('backend.'.$this->route_path.'index', compact('entries'));
    }

    public function create()
    {
        if(!in_array(4, $this->auth_company_roles_ids)) {
            return redirect('/company/dashboard')->with('error', 'ليس لديك صلاحية لذلك!');
        }

        return view('backend.'.$this->route_path.'create');
    }

    public function store(EntryRequest $request)
    {
        if(!in_array(4, $this->auth_company_roles_ids)) {
            return redirect('/company/dashboard')->with('error', 'ليس لديك صلاحية لذلك!');
        }

        $entry = User::create([
            'name' => $request->name,
            'mobile' => $request->mobile,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'role' => 'entry',
            'added_by' => Auth::user()->id,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        event(new NewUserEvent($entry, $request));
        return redirect()->route($this->route_path.'index')->with('success', 'تم إضافة مسئول الدخول بنجاح!');
    }

    public function show($id)
    {
        if(!in_array(4, $this->auth_company_roles_ids)) {
            return redirect('/company/dashboard')->with('error', 'ليس لديك صلاحية لذلك!');
        }

        $entry = User::where(['id' => $id])->first();
        return view('backend.'.$this->route_path.'show', compact('entry'));
    }
    public function edit($id)
    {
        if(!in_array(4, $this->auth_company_roles_ids)) {
            return redirect('/company/dashboard')->with('error', 'ليس لديك صلاحية لذلك!');
        }

        $entry = User::where(['id' => $id])->first();
        return view('backend.'.$this->route_path.'edit', compact('entry'));
    }

    public function update(EntryRequest $request, $id)
    {
        if(!in_array(4, $this->auth_company_roles_ids)) {
            return redirect('/company/dashboard')->with('error', 'ليس لديك صلاحية لذلك!');
        }

        $entry = User::whereId($id)->first();
        if($request->password) {
            $entry->password = bcrypt($request->password);
        }
        $entry->name = $request->name;
        $entry->mobile = $request->mobile;
        $entry->email = $request->email;
        $entry->updated_at = now();
        $entry->save();
        return redirect()->route($this->route_path.'index')->with('success', 'تم تحديث بيانات مسئول الدخول بنجاح!');
    }

    public function destroy($id)
    {
        if(!in_array(4, $this->auth_company_roles_ids)) {
            return redirect('/company/dashboard')->with('error', 'ليس لديك صلاحية لذلك!');
        }

        $entry = User::whereId($id)->first();
        $entry->delete();

        return redirect()->route($this->route_path.'index')->with('success', 'تم حذف مسئول الدخول بنجاح!');
    }
}
