<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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
                'post_image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
            ],
            [],
            [
                'post_body' => 'post',
                'post_image' => 'attached file',
            ]);

        $path = NULL;

        if($request->hasFile('post_image')) {
            $path = $request->file('post_image')->store('public/uploads/posts');
        }

        // store
        Post::create([
            'user_id' => auth()->user()->id,
            'body' => $request->get('post_body'),
            'image' => $request->file('post_image')->hashName(),
        ]);

        return redirect()->back()->with('success', 'Your post was published successfully.');
    }
}
