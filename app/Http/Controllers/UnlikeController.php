<?php

namespace App\Http\Controllers;

use App\Models\Like;
use App\Models\Post;

class UnlikeController extends Controller
{
    //
    public function destroy(Post $post)
    {
        // already not liked?
        if (!$post->is_liked) {
            return redirect()->back()->with('danger', 'You haven\'t liked the post.');
        }

        // delete
        Like::where('user_id', auth()->id())->where('post_id', $post->id)->delete();

        return redirect()->back()->with('info', 'Post unliked.');
    }
}
