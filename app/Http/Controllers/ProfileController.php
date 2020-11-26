<?php

namespace App\Http\Controllers;

use App\Models\User;

class ProfileController extends Controller
{
    public function show(User $user = null)
    {

        if ($user === null) {
            $user = auth()->user();
        }

        $posts = $user->posts()->simplePaginate(10);

        return view('profile', compact('user', 'posts'));
    }
}
