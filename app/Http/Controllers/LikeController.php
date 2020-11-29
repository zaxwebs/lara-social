<?php

namespace App\Http\Controllers;

use App\Models\Like;
use App\Models\Post;

class LikeController extends Controller
{
    //
    public function store(Post $post)
    {
        // already liked?

        // owns the post?
        if ($post->user_id === auth()->id()) {
            return redirect()->back()->with('danger', 'You can\'t like this post.');
        }

        // store
        Like::create([
            'user_id' => auth()->id(),
            'post_id' => $post->id,
        ]);

        return redirect()->back();
    }
}
