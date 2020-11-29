<?php

namespace App\Http\Controllers;

class FollowingController extends Controller
{
    //
    public function index(User $user)
    {
        $follows = $user->follows()->simplePaginate(100);

        return view('follows', compact('follows'));
    }
}
