<?php

namespace App\Http\Controllers;

use App\Models\Likes;
use App\Models\Posts;
use Auth;
use Illuminate\Http\Request;

class PostLikeController extends Controller
{
    public function toggleLike(Request $request)
    {
        $postId = $request->post_id;
        $userId = auth()->id();

        // Check if the user has already liked the post
        $like = Likes::where('post_id', $postId)
            ->where('user_id', $userId)
            ->first();

        $liked = false;

        // Toggle like or unlike
        if ($like) {
            // If already liked, remove the like
            $like->delete();
        } else {
            // If not liked, create a new like
            Likes::create([
                'user_id' => $userId,
                'post_id' => $postId
            ]);
            $liked = true;
        }

        // Return total likes count for the post
        $totalLikes = Likes::where('post_id', $postId)->count();
        return response()->json(['total_likes' => $totalLikes, 'liked' => $liked]);
    }

}
