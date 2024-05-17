<?php

namespace App\Http\Controllers;

use App\Models\Posts;
use App\Models\Profiles;
use Auth;
use Illuminate\Http\Request;

class ProfilesController extends Controller
{
    public function showProfile()
    {
        $userId = Auth::id();

        // Retrieve posts for the authenticated user with their profile
        $posts = Posts::with('profile')
            ->where('user_id', $userId) // Assuming 'user_id' is the foreign key in the 'posts' table
            ->orderBy('created_at', 'desc')
            ->get();

        return view('pages.profile', compact('posts'));
        // return $posts;
    }
}
