<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminLoginController extends Controller
{
    public function login()
    {
        return view('secondVersion.admin.login');
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials) && Auth::user()->role === 'admin') {
            return redirect()->intended('/admin/dashboard');
        }

        return redirect('/admin/login')->withErrors(['error' => 'Invalid credentials or not an admin']);
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/admin/login');
    }
}
