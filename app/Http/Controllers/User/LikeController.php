<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LikeController extends Controller
{
    public function toggle($postId)
    {
        if(Auth::check()) {
            if(Auth::user()->roles !== 'user') {
                return redirect()->back();
            }
            $post = Post::find($postId);
            $attr = [
                'user_id' => Auth::user()->id
            ];
    
            if($post->likes()->where($attr)->exists()) {
                $post->likes()->where($attr)->delete();
                return redirect()->back();
            } else {
                $post->likes()->create($attr);
                return redirect()->back();
            }
        } else {
            return redirect()->route('auth.login');
        }
    }
}
