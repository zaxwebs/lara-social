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
        //specify alert location
        $request->session()->flash('alert.location', 'signup');

        // validate
        $this->validate($request,
            [
                'signup_first_name' => 'required|max:30|alpha',
                'signup_last_name' => 'required|max:30|alpha',
                'signup_email' => 'required|email|unique:users,email',
                'signup_username' => 'required|alpha_num|unique:users,username',
                'signup_password' => 'required|min:6|confirmed',
                'signup_tc' => 'accepted',
            ],
            [
                'signup_tc.accepted' => 'You haven\'t agreed to our terms & conditions.',
            ],
            [
                'signup_first_name' => 'first name',
                'signup_last_name' => 'last name',
                'signup_email' => 'email address',
                'signup_username' => 'username',
                'signup_password' => 'password',
            ]);

        // store
        User::create([
            'first_name' => $request->get('signup_first_name'),
            'last_name' => $request->get('signup_last_name'),
            'email' => $request->get('signup_email'),
            'username' => $request->get('signup_username'),
            'password' => Hash::make($request->get('signup_password')),
        ]);

        // attempt sign in
        if (!auth()->attempt(['email' => $request->signup_email, 'password' => $request->signup_password])) {
            return redirect('/')->with('danger', 'Account created but login failed.');
        }

        //unset alert location
        $request->session()->forget('alert.location');

        // redirect
        return redirect('/home')->with('success', 'Welcome to ' . config('app.name') . '. Your account was created successfully.');

    }
}
