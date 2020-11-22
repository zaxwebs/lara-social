<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class LogoutController extends Controller
{
    public function store()
    {

        if (!Auth::check()) {
            return redirect()->route('welcome')->with('success', 'You have already logged out.');
        }

        auth()->logout();

        return redirect()->route('welcome')->with('success', 'Logged out successfully.');
    }
}
