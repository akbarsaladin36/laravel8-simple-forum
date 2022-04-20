<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        if(Auth::check()) {
            if(Auth::user()->roles !== 'admin') {
                return redirect()->back();
            }
            return view('admin.dashboard.index');
        } else {
            return redirect()->route('auth.login');
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('auth.login');
    }

}
