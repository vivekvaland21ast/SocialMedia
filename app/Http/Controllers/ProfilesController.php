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

        // Retrieve posts for the authenticated user with their profile
        $posts = Posts::with('profile')
            ->where('user_id', $userId) // Assuming 'user_id' is the foreign key in the 'posts' table
            ->orderBy('created_at', 'desc')
            ->get();

        return view('pages.profile', compact('posts'));
        // return $posts;
    }
    // public function getFriends()
    // {
    //     // $friend = Profiles::all();
    //     $friend = Profiles::with('profile')->get();
    //     // return $friend;
    //     return view('pages.rightSide', compact('friend'));
    // }
    public function updateProfile(Request $request)
    {
        // Retrieve the user's profile
        $profile = Profiles::find(auth()->user()->id);

        // Update profile fields
        $profile->full_name = $request->input('fullname');
        $profile->username = $request->input('username');
        $profile->email = $request->input('email');

        // Update password if new password is provided
        if ($request->filled('newPassword')) {
            // Update the password
            $profile->password = Hash::make($request->input('newPassword'));
        }

        // Handle profile image upload
        if ($request->hasFile('profileImage')) {
            // Delete old profile image if exists
            // if ($profile->profile) {
            //     Storage::delete($profile->profile);
            // }

            // // Store new profile image
            // $profileImagePath = $request->file('profileImage')->store('profile_images');
            // $profile->profile = $profileImagePath;

            $profileImage = $request->file('profileImage');
            $imageName = time() . '_' . $profileImage->getClientOriginalName();
            $profileImage->move(public_path('profile_images'), $imageName);
        }

        // Save the changes
        $profile->save();

        // Redirect back with success message
        return redirect()->back()->with('success', 'Profile updated successfully.');
    }
}
