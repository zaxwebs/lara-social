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
                'login_email' => 'required|email',
                'login_password' => 'required',
            ],
            [],
            [
                'login_email' => 'email address',
                'login_password' => 'password',
            ]);

        $remember = $request->login_remember === 'on' ? true : false;

        if (!auth()->attempt(['email' => $request->login_email, 'password' => $request->login_password], $remember)) {
            return redirect()->back()->with('danger', 'Invalid login credentials. Please try again.');
        }

        return redirect('home');
    }
}
