<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class PostController extends Controller
{
    public function create()
    {
        if(Auth::check()) {
            if(Auth::user()->roles !== 'user') {
                return redirect()->back();
            }
            return view('user.posts.create');
        } else {
            return redirect()->route('auth.login');
        }
    }

    public function store(Request $request)
    {
        if(Auth::check()) {
            if(Auth::user()->roles !== 'user') {
                return redirect()->back();
            }

            $validator = Validator::make($request->all(), [
                'title' => 'required|min:5',
                'body' => 'required|min:5|max:255'
            ]);

            if($validator->fails()) {
                return redirect()->route('user.create.post');
            }

            $user = Auth::user();

            $user->posts()->create([
                'title' => $request->title,
                'body' => $request->body,
                'slug' => Str::slug($request->title, '-',).'-'.time()
            ]);

            return redirect()->route('user.home');
        } else {
            return redirect()->route('auth.login');
        }
    }

    public function show($postId)
    {
        if(Auth::check()) {
            if(Auth::user()->roles !== 'user') {
                return redirect()->back();
            }
            $post = Post::find($postId);
            $comment = Comment::where('post_id',$postId)->get();
            // dd($comment);
            return view('user.posts.show', compact('post','comment'));
        } else {
            return redirect()->route('auth.login');
        }
    }
}
