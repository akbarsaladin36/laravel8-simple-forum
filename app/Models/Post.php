<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'body',
        'slug',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function postComment()
    {
        return $this->hasMany(Comment::class);
    }

    public function likes()
    {
        return $this->hasMany(Like::class);
    }

    public function is_Liked()
    {
        return $this->likes->where('user_id', Auth::user()->id)->count();
    }

}
