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
    public function updateProfile(Request $request)
    {

        $profile = Profiles::find(auth()->user()->id);

        $profile->full_name = $request->input('fullname');
        $profile->username = $request->input('username');
        $profile->email = $request->input('email');


        if ($request->filled('newPassword')) {

            $profile->password = Hash::make($request->input('newPassword'));
        }

        if ($request->hasFile('profileImage')) {

            $profileImage = $request->file('profileImage');
            $imageName = time() . '_' . $profileImage->getClientOriginalName();
            $profileImage->move(public_path('profile_images'), $imageName);
        }

        $profile->save();

        return redirect()->back()->with('success', 'Profile updated successfully.');
    }
}
