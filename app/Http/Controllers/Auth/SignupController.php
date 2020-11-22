<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

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
        // sign in

        // redirect

    }
}
