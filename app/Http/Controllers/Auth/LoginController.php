<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{
    public function index()
    {
        if(Auth::check()) {
            if(Auth::user()->roles === 'admin') {
                return redirect()->route('admin.dashboard');
            } else {
                return redirect()->route('user.home');
            }
        } else {
            return view('auth.login.index');
        }
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|min:5',
            'password' => 'required|min:5'
        ]);

        if($validator->fails()) {
            return redirect()->route('auth.login');
        }

        $data = [
            'email' => $request->email,
            'password' => $request->password
        ];

        if(Auth::attempt($data)) {
            if(Auth::user()->roles === "admin") {
                return redirect()->route('admin.dashboard');
            } else {
                return redirect()->route('user.home');
            }
        } else {
            return redirect()->route('auth.login');
        }

    }
}
