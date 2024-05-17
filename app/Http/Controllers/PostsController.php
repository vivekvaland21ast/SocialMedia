<?php

namespace App\Http\Controllers;

use App\Models\Posts;
use Hash;
use Illuminate\Http\Request;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate the incoming request
        $request->validate([
            'captionText' => 'required|string',
            'imageFile' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Adjust validation rules as needed
        ]);

        // Check if file is uploaded
        if ($request->hasFile('imageFile')) {
            // Store the image
            $imageName = time() . '_' . $request->file('imageFile')->getClientOriginalName();
            $request->file('imageFile')->move(public_path('post_images'), $imageName);
        }
        // Create the post
        $post = new Posts();
        $post->post_caption = $request->captionText;
        $post->post_image = $imageName ?? null;
        $post->user_id = auth()->id();
        $post->save();


        // Redirect or return a response
        return redirect()->back()->with('success', 'Post created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $post = Posts::find($id);

        if ($post) {
            $post->delete();
            return redirect()->route('profile')->with('success', 'Post deleted successfully');
        } else {
            return redirect()->route('profile')->with('error', 'Post not found');
        }
    }
}
