<?php

namespace App\Http\Controllers;

use App\Models\Posts;
use Illuminate\Http\Request;

class UserPostController extends Controller
{
    public function create()
    {
        return view('posts.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'post_caption' => 'required|string|max:255',
            'post_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $imagePath = $request->file('post_image')->store('uploads', 'public');

        Posts::create([
            'post_caption' => $request->post_caption,
            'post_image' => $imagePath,
            'user_id' => Auth::id(),
        ]);

        return redirect()->back()->with('success', 'Post created successfully.');
    }
}
