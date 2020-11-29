<?php

namespace App\Http\Controllers;

use App\Models\Post;

class FeedController extends Controller
{
    public function index()
    {
        $follows = auth()->user()->follows()->pluck('followed_id');

        // add self to follows array
        $follows[] = auth()->user();

        $posts = Post::whereIn('user_id', $follows)->with('user')->orderBy('created_at', 'desc')->simplePaginate(10);

        return view('feed', compact('posts'));
    }
}
