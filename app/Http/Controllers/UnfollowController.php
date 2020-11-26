<?php

namespace App\Http\Controllers;

use App\Models\Follow;
use App\Models\User;

class UnfollowController extends Controller
{
    public function store(User $user)
    {
        // validate
        $follows = Follow::where('user_id', auth()->user()->id)->where('followed_id', $user->id);

        // if user isn't following
        if ($follows->count() < 1) {
            return redirect()->back()->with('info', "You have already unfollowed {$user->first_name}.");
        }

        // delete
        $follows->delete();

        return redirect()->back()->with('success', "You have unfollowed {$user->first_name}.");
    }
}
