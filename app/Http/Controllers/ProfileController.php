<?php

namespace App\Http\Controllers;

class ProfileController extends Controller
{
    public function show(User $user = null)
    {
        // if no username

        if ($user === null) {
            $user = auth()->user();
        }

        $posts = $user->posts;

        return view('profile', compact('posts'));
    }
}
