<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class CommentController extends Controller
{
    public function store(Request $request, $postId)
    {

        if(Auth::check()) {
            if(Auth::user()->roles !== 'user') {
                return redirect()->back();
            }
            $validator = Validator::make($request->all(), [
                'comment_body' => 'required|min:5|max:255'
            ]);
    
            if($validator->fails()) {
                return redirect()->route('user.show.post',['postId' => $postId]);
            }
    
            $user = Auth::user();
    
            $user->comments()->create([
                'post_id' => $postId,
                'comment_body' => $request->comment_body
            ]);
    
            return redirect()->route('user.show.post', ['postId' => $postId]);
        } else {
            return redirect()->route('auth.login');
        }

    }
}
