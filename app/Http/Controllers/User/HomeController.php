<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        if(Auth::check()) {
            if(Auth::user()->roles !== 'user') {
                return redirect()->back();
            }

            $user = Auth::user();

            $id_list = $user->following()->pluck('followers.following_id')->toArray();
            $id_list[] = $user->id;
            



            $no = 1;
            $posts = Post::whereIn('user_id', $id_list)->get();
            return view('user.home.index', compact('posts','no'));
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
