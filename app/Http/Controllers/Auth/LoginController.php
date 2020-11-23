<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function index()
    {
        return view('welcome');
    }

    public function store(Request $request)
    {
        //specify alert location
        $request->session()->flash('alert.location', 'login');

        // validate
        $this->validate($request,
            [
                'login_email_username' => 'required',
                'login_password' => 'required',
            ],
            [],
            [
                'login_email_username' => 'email or username',
                'login_password' => 'password',
            ]);

        $remember = $request->login_remember === 'on' ? true : false;

        $login_type = filter_var($request->login_email_username, FILTER_VALIDATE_EMAIL) ? 'email' : 'username';

        if (!auth()->attempt([$login_type => $request->login_email_username, 'password' => $request->login_password], $remember)) {
            return redirect()->back()->with('danger', 'Invalid login credentials. Please try again.');
        }

        return redirect('home');
    }
}
