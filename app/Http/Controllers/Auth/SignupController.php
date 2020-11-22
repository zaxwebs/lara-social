<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class SignupController extends Controller
{
    public function index()
    {
        return view('welcome');
    }

    public function store(Request $request)
    {
        // validate
        $this->validate($request,
            [
                'signup_first_name' => 'required|max:30',
                'signup_last_name' => 'required|max:30',
                'signup_email' => 'required|email|unique:users,email',
                'signup_password' => 'required|confirmed',
                'signup_tc' => 'accepted',
            ],
            [
                'signup_tc.accepted' => 'You haven\'t agreed to our terms & conditions.',
            ],
            [
                'signup_first_name' => 'first name',
                'signup_last_name' => 'last name',
                'signup_email' => 'email address',
                'signup_password' => 'password',
            ]);

        // store
        User::create([
            'first_name' => $request->get('signup_first_name'),
            'last_name' => $request->get('signup_last_name'),
            'email' => $request->get('signup_email'),
            'password' => Hash::make($request->get('signup_first_name')),
        ]);
        // sign in
        auth()->attempt(['email' => $request->signup_email, 'password' => $request->signup_password]);
        // redirect
        return redirect('/')->with('success', 'Welcome to ' . config('app.name') . '. Your account was created successfully.');

    }
}
