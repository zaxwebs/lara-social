<?php

namespace App\Http\Controllers;

use App\Models\User;

class FollowersController extends Controller
{
    public function index(User $user)
    {
        $heading = "Followers";
        $followers = $user->followers()->simplePaginate(50);
        return view('follows', compact('heading', 'followers', 'user'));
    }
}
