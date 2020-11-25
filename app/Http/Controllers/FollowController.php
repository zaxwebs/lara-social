<?php

namespace App\Http\Controllers;

use App\Models\Follow;
use App\Models\User;

class FollowController extends Controller
{
    public function store(User $user)
    {
        // validate
        // if user is adding self.
        if ($user->is_viewer) {
            return redirect()->back();
        }
        // if user is already following
        if (Follow::where('user_id', auth()->user()->id)->where('followed_id', $user->id)->count() > 0) {
            return redirect()->back()->with('info', "You are already following {$user->first_name}.");
        }
        // store
        Follow::create([
            'user_id' => auth()->user()->id,
            'followed_id' => $user->id,
        ]);

        return redirect()->back()->with('success', "You are now following {$user->first_name}.");
    }
}
