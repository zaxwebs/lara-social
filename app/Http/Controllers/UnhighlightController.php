<?php

namespace App\Http\Controllers;

use App\Models\Post;

class UnhighlightController extends Controller
{
    //
    public function destroy(Post $post)
    {
        // already not highlighted?
        if (!$post->highlighted === 1) {
            return redirect()->back()->with('info', 'The post isn\'t highlighted.');
        }

        // owns the post?
        if ($post->user_id !== auth()->user()->id) {
            return redirect()->back()->with('danger', 'You can\'t unhighlight this post.');
        }
        // store
        $post->highlighted = 0;
        $post->save();

        return redirect()->back()->with('success', 'Your post was unhighlighted successfully.');
    }
}
