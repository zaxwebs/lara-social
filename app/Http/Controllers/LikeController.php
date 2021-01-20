<?php

namespace App\Http\Controllers;

use App\Models\Like;
use App\Models\Post;
use App\Models\User;
use App\Notifications\PostLiked;

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

        //notify writer
        $user = User::find($post->user_id);
        $user->notify(new PostLiked($post));

        return redirect()->back();
    }
}
