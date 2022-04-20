<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
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
            return view('auth.register.index');
        }
    }

    public function store(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'username' => 'required|min:5',
            'email' => 'required|min:5|email|unique:users',
            'password' => 'required|min:5'
        ]);

        if($validator->fails()) {
            return redirect()->route('auth.register');
        }

        User::create([
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'roles' => 'user'
        ]);

        return redirect()->route('auth.login');
    }
}
