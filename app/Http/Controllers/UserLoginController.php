<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserLoginController extends Controller
{

    // Show the login form
    public function login()
    {
        return view('secondVersion.user.login');
    }

    // Handle login request
    public function authenticate(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials) && Auth::user()->role === 'user') {
            return redirect()->intended('/dashboard');
        }

        return redirect('/login')->withErrors(['error' => 'Invalid credentials or not a user']);
    }

    // Handle logout
    public function logout()
    {
        Auth::logout();
        return redirect('/login');
    }

}
