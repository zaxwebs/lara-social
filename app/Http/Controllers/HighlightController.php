<?php

namespace App\Http\Controllers;

use App\Models\Post;

class HighlightController extends Controller
{
    //
    public function store(Post $post)
    {
        // already highlighted?
        if ($post->highlighted === 1) {
            return redirect()->back()->with('info', 'You\'ve already highlighted the post.');
        }
        // owns the post?
        if (!$post->user_id === auth()->user()->id) {
            return redirect()->back()->with('danger', 'You can\'t highlight this post.');
        }
        // store
        $post->highlighted = 1;
        $post->save();

        return redirect()->back()->with('success', 'Your post was highlighted successfully.');
    }
}
