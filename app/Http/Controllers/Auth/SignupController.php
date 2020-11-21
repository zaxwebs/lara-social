<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;

class SignupController extends Controller
{
    public function index()
    {
        return view('auth.signup');
    }
}
