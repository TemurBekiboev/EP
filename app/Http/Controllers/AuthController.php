<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function registration(Request $request){
        $request->validate([
           'name'=>'required|string|max:225',
            'email'=>'required|string|max:225|email|unique:users',
            'password'=>'required|string|min:8|confirmed',
        ]);

        $role = $request->has('is_admin')? User::ROLE_ADMIN : User::ROLE_USER;
        $user = User::create([
           'name'=> $request->name,
            'email'=> $request->email,
            'password'=> Hash::make($request->password),
            'role'=> $role,
        ]);

        Auth::login($user);

        return redirect()->route('dashboard');
    }
}
