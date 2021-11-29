<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Events\NewUserEvent;
use Illuminate\Http\Request;
use App\Http\Requests\Backend\Admin\Entries\EntryRequest;
use Illuminate\Support\Facades\DB;
use Auth;

class EntriesController extends Controller
{

    public $route_path = 'admin.entries.';

    public function index(Request $request)
    {
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
        return view('backend.'.$this->route_path.'create');
    }

    public function store(EntryRequest $request)
    {
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
        $entry = User::where(['id' => $id])->first();
        return view('backend.'.$this->route_path.'show', compact('entry'));
    }
    public function edit($id)
    {
        $entry = User::where(['id' => $id])->first();
        return view('backend.'.$this->route_path.'edit', compact('entry'));
    }

    public function update(EntryRequest $request, $id)
    {
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
        $entry = User::whereId($id)->first();
        $entry->delete();

        return redirect()->route($this->route_path.'index')->with('success', 'تم حذف مسئول الدخول بنجاح!');
    }
}
