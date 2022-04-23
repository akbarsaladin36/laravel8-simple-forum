<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class ProfileController extends Controller
{
    public function show($username)
    {
        if(Auth::check()) {
            if(Auth::user()->roles !== 'user') {
                return redirect()->back();
            }
            $user = User::where('username', $username)->first();

            return view('user.profile.show',['user'=>$user]);
        } else {
            return redirect()->route('auth.login');
        }
    }

    public function edit($username)
    {
        if(Auth::check()) {
            if(Auth::user()->roles !== 'user') {
                return redirect()->back();
            }
            $user = User::where('username', $username)->first();
            return view('user.profile.edit',['user'=>$user]);
        } else {
            return redirect()->route('auth.login');
        }
    }

    public function update(Request $request, $username)
    {
        if(Auth::check()) {
            if(Auth::user()->roles !== 'user') {
                return redirect()->back();
            }

            $validator = Validator::make($request->all(), [
                'first_name' => 'required|min:4|max:32',
                'last_name' => 'required|min:4|max:32',
                'address' => 'max:255',
                'phone_number' => 'max:32'
            ]);

            if($validator->fails()) {
                return redirect()->route('user.edit.profile', ['username'=>$username]);
            }

            $user = User::where('username', $username)->first();
            $user->update([
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'address' => $request->address,
                'phone_number' => $request->phone_number
            ]);

            return redirect()->route('user.show.profile', ['username'=>$username]);
        } else {
            return redirect()->route('auth.login');
        }
    }

    public function follow($following_id)
    {
        if(Auth::check()) {
            if(Auth::user()->roles !== 'user') {
                return redirect()->back();
            }

            $user = Auth::user();

            if($user->following->contains($following_id)) {
                $user->following()->detach($following_id);
                return redirect()->back();
            } else {
                $user->following()->attach($following_id);
                return redirect()->back();
            }
        } else {
            return redirect()->route('auth.login');
        }
    }


}