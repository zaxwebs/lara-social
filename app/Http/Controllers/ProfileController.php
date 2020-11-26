<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function show(Request $request, User $user = null)
    {

        if ($user === null) {
            $user = auth()->user();
        }

        $query = $user->posts();

        //filter

        if ($request->has('highlights')) {
            $query = $query->where('highlighted', 1);
        }

        $posts = $query->simplePaginate(10);

        return view('profile', compact('user', 'posts'));
    }
}
