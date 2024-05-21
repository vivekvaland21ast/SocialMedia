<?php

namespace App\Http\Controllers;

use App\Models\Posts;
use App\Models\Profiles;
use Auth;
use Hash;
use Illuminate\Http\Request;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $profile= Profiles::all();
        // $profiles = Profiles::with('posts')->get();
        // $posts = Posts::all();
        $posts = Posts::with('profile', 'likes')->orderBy('created_at', 'desc')->get();
        // dd($posts);
        $friends = Profiles::where('id', '!=', Auth::id())->get();
        return view('index', compact('posts', 'friends'));
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
        $imageName = null;

        // Check if the file is uploaded
        if ($request->hasFile('imageFile')) {
            // Store the image with a unique name to avoid overwriting existing files
            $imageName = time() . '_' . $request->file('imageFile')->getClientOriginalName();
            $request->file('imageFile')->move(public_path('post_images'), $imageName);
        }

        // Create the post and associate it with the authenticated user
        $post = new Posts();
        $post->post_caption = $request->input('captionText', ''); // Default to an empty string if not provided
        $post->post_image = $imageName;
        $post->user_id = auth()->id();
        $post->save();

        // Redirect or return a response
        return redirect()->back()->with('success', 'Post created successfully.');

        // $post->load('profile'); // Eager load profile relationship

        // // Render the post HTML
        // $postHtml = view('postList.post', compact('post'))->render();

        // // Return a JSON response
        // return response()->json(['success' => 'Post created successfully.', 'postHtml' => $postHtml]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }


    public function edit($id)
    {
        // $post = Posts::find($id);
        // return view('profile', compact('post'));
    }

    public function update(Request $request, $id)
    {
        $post = Posts::find($id);
        if (!$post) {
            return response()->json(['error' => 'Post not found'], 404);
        }
        $post->post_caption = $request->captionText;
        if ($request->hasFile('imageFile')) {
            $file = $request->file('imageFile');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('post_images'), $fileName);
            $post->post_image = $fileName;
        }
        $post->save();
        return redirect('/profile');
    }

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
