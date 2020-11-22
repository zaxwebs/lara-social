<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;

class LogoutController extends Controller
{
    public function store()
    {
        auth()->logout();

        return redirect()->route('welcome')->with('success', 'Logged out successfully.');
    }
}
