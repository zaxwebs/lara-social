<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function store(Request $request)
    {
        //specify alert location
        $request->session()->flash('alert.location', 'post');

        //validate
        $this->validate($request,
            [
                'post_body' => 'required|max:1000',
            ],
            [],
            [
                'post_body' => 'post',
            ]);

        // store
        Post::create([
            'user_id' => auth()->user()->id,
            'body' => $request->get('post_body'),
        ]);

        return redirect()->back()->with('success', 'Your post was published successfully.');
    }
}
