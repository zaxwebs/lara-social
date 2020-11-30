<?php

namespace App\Http\Controllers;

use App\Models\User;

class FollowingController extends Controller
{
    //
    public function index(User $user)
    {
        $heading = "Following";
        $followers = $user->follows()->simplePaginate(50);
        return view('follows', compact('heading', 'followers', 'user'));
    }
}
