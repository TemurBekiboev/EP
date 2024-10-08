<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminLoginController extends Controller
{
    public function login()
    {
        return view('admin.login');
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials) && Auth::user()->isAdmin()) {
            return redirect()->route('admin-dashboard');
        }

        return redirect()->route('admin-login-form')->withErrors(['error' => 'Invalid credentials or not an admin']);
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/admin/login');
    }
}
