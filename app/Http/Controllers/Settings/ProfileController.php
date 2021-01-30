<?php

namespace App\Http\Controllers\Settings;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    //
    public function update(Request $request) {
        $user = auth()->user();

        //specify alert location
        $request->session()->flash('alert.location', 'settings_profile');

        //validate
        $this->validate($request,
            [
                'settings_profile_bio' => 'max:1000',
                'settings_profile_image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
            ],
            [],
            [
                'settings_profile_bio' => 'bio',
                'settings_profile_image' => 'profile image',
            ]);

        if($request->hasFile('settings_profile_image')) {
            $path = 'public/uploads/profile-images';
            Storage::delete($path . '/' . $user->image);
            $request->file('settings_profile_image')->store($path);
        }

        $user->update([
            'bio' => $request->get('settings_profile_bio'),
            'image' => $request->hasFile('settings_profile_image') ? $request->file('settings_profile_image')->hashName() : $user->image,
            ]);

        return redirect()->back()->with('success', 'Profile updated.');
    }
}
