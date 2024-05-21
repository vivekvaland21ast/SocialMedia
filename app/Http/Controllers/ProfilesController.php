<?php

namespace App\Http\Controllers;

use App\Models\Posts;
use App\Models\Profiles;
use Auth;
use Hash;
use Illuminate\Http\Request;

class ProfilesController extends Controller
{
    public function showProfile()
    {
        $userId = Auth::id();

        $posts = Posts::with('profile')
            ->where('user_id', $userId)
            ->orderBy('created_at', 'desc')
            ->get();

        return view('pages.profile', compact('posts'));
        // return $posts;
    }
}
