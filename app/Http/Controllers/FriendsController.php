<?php

namespace App\Http\Controllers;

use App\Models\Friends;
use App\Models\Profiles;
use Auth;
use Illuminate\Http\Request;

class FriendsController extends Controller
{

    // public function addFriend(Request $request)
    // {
    //     $friendId = $request->input('friend_id');

    //     // Check if the friendship already exists
    //     if (!Friends::where('user_id', auth()->id())->where('friend_id', $friendId)->exists()) {
    //         // Create a new friendship record
    //         Friends::create([
    //             'user_id' => auth()->id(),
    //             'friend_id' => $friendId
    //         ]);
    //     }

    //     return response()->json(['message' => 'Friend added successfully']);
    // }

    // public function removeFriend(Request $request)
    // {
    //     $friendId = $request->input('friend_id');

    //     // Delete the friendship record
    //     Friends::where('user_id', auth()->id())->where('friend_id', $friendId)->delete();

    //     return response()->json(['message' => 'Friend removed successfully']);
    // }

    // public function getAddedFriends()
    // {
    //     $userId = auth()->id();
    //     $friends = Friends::where('user_id', $userId)->get();
    //     return response()->json(['friends' => $friends]);
    // }

    // public function showFriends()
    // {
    //     $user = auth()->user();
    //     $friends = Profiles::all(); // Or however you get your users

    //     // Ensure each friend status is checked correctly
    //     foreach ($friends as $friend) {
    //         $friend->is_friend = $user->hasFriend($friend->id);
    //     }

    //     return view('friends', ['friends' => $friends]);
    // }

    public function toggleFriend(Request $request)
    {
        $friendId = $request->friend_id;
        $userId = auth()->id();

        // Check if the user is already a friend
        $isFriend = Friends::where('friend_id', $friendId)
            ->where('user_id', $userId)
            ->exists();

        // Toggle friend status
        if ($isFriend) {
            // If already a friend, remove
            Friends::where('friend_id', $friendId)
                ->where('user_id', $userId)
                ->delete();
            $message = 'Friend removed successfully.';
        } else {
            // If not a friend, add
            Friends::create([
                'user_id' => $userId,
                'friend_id' => $friendId
            ]);
            $message = 'Friend added successfully.';
        }

        return response()->json(['message' => $message]);
    }



    public function showFriends()
    {
        // Retrieve the authenticated user
        $user = auth()->user();

        // Retrieve the user's friends
        $friends = $user->friends; // Assuming 'friends' is the relationship defined in the User model

        // Pass the friends to the view
        return view('friends', ['friends' => $friends]);
    }

    // public function addFriend(Request $request)
    // {
    //     $friendId = $request->input('friend_id');
    //     $user = Auth::user();

    //     // Check if the friend exists
    //     $friend = Profiles::find($friendId);
    //     if (!$friend) {
    //         return response()->json(['message' => 'User not found'], 404);
    //     }

    //     // Add the friend (you might need to adjust this based on your relationship setup)
    //     $user->friends()->attach($friendId);

    //     return response()->json(['message' => 'Friend added successfully']);
    // }

    // public function removeFriend(Request $request)
    // {
    //     $friendId = $request->input('friend_id');
    //     $user = Auth::user();

    //     // Check if the friend exists
    //     $friend = Profiles::find($friendId);
    //     if (!$friend) {
    //         return response()->json(['message' => 'User not found'], 404);
    //     }

    //     // Remove the friend (you might need to adjust this based on your relationship setup)
    //     $user->friends()->detach($friendId);

    //     return response()->json(['message' => 'Friend removed successfully']);
    // }
}
