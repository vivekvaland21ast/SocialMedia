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
        // $profile= Profiles::all();
        // $profiles = Profiles::with('posts')->get();
        // $posts = Posts::all();
        $posts = Posts::with('profile','likes')->orderBy('created_at', 'desc')->get();
        // dd($posts);
        return view('index', compact('posts'));

        // $posts = Posts::orderBy('created_at', 'desc')->get();
        // return view('posts.index', compact('posts'));
        // return $posts;
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


        if ($request->hasFile('imageFile')) {

            $imageName = time() . '_' . $request->file('imageFile')->getClientOriginalName();
            $request->file('imageFile')->move(public_path('post_images'), $imageName);
        }


        $post = new Posts();
        $post->post_caption = $request->input('captionText', '');
        $post->post_image = $imageName;
        $post->user_id = auth()->id();
        $post->save();

        return redirect()->back()->with('success', 'Post created successfully.');
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
