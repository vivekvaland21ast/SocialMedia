<?php

namespace App\Http\Controllers;

use App\Models\Profiles;
use Illuminate\Http\Request;
use App\Models\Posts;

class HomeController extends Controller
{
    public function homeShow()
    {
        // $profile= Profiles::all();
        // $profiles = Profiles::with('posts')->get();
        // $posts = Posts::all();
        $posts = Posts::with('profile')->orderBy('created_at', 'desc')->get();
        // dd($posts);
        return view('index', compact('posts'));
        // return $posts;
    }
}
