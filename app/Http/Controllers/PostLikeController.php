<?php

namespace App\Http\Controllers;

use App\Models\Posts;
use Illuminate\Http\Request;

class PostLikeController extends Controller
{
    public function like(Posts $post)
    {
        $post->increment('likes');
        // Save like to database if you want to track who liked the post
        return response()->json(['success' => true]);
    }

    public function dislike(Posts $post)
    {
        $post->increment('dislikes');
        // Save dislike to database if you want to track who disliked the post
        return response()->json(['success' => true]);
    }
}
