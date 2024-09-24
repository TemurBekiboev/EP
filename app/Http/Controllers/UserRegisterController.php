<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserRegisterController extends Controller
{
    public function showRegistrationForm(){
        return view('auth.user_register');
    }
    public function register(Request $request){
        $request->validate([
           'name'=> 'required|string|max:255',
            'email'=> 'required|string|max:255|email|unique:users',
            'password'=> 'required|min:8|string|confirmed',
        ]);


    }
}
