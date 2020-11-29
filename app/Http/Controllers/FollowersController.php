<?php

namespace App\Http\Controllers;

use App\Models\User;

class FollowersController extends Controller
{
    public function index(User $user)
    {
        $followers = $user->followers()->simplePaginate(100);

        return view('followers', compact('followers'));
    }
}
