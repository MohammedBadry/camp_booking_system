<?php

namespace App\Http\Controllers\Backend\Entry;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;

class DashboardController extends Controller
{
    
    function index() {
        return view('backend.entry.dashboard');
    }

    public function scanner()
    {
        return view('backend.entry.scanner');
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('entry.login');
    }
}
