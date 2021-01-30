<?php

namespace App\Http\Controllers\Settings;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class Profile extends Controller
{
    //
    public function update(Request $request) {
        //specify alert location
        $request->session()->flash('alert.location', 'settings_profile');

        //validate
        $this->validate($request,
            [
                'settings_profile_profile_image' => 'required_without:post_image|max:1000',
                'settings_profile_bio' => 'required_without:post_body|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
            ],
            [],
            [
                'post_body' => 'post',
                'post_image' => 'attached file',
            ]);

        if($request->hasFile('post_image')) {
            $request->file('post_image')->store('public/uploads/posts');
        }
    }
}
