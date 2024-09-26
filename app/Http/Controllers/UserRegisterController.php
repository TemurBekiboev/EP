<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserRegisterController extends Controller
{
    // Show the registration form
    public function showRegistrationForm()
    {
        return view('secondVersion.user.registration');
    }

    // Handle registration request
    public function register(Request $request)
    {
        // Validate registration data
       $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8',
           'confirm-password'=> 'required|same:password|min:8',
        ]);
//        if($validator->fails()){
//            return redirect()->back()->withErrors($validator)->withInput();
//        }

        // Create new user
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password), // Hash the password
            'role' => 'user', // Set role to 'user'
        ]);

        // Log the user in
//        Auth::login($user);

        // Redirect to user dashboard
        return redirect()->route('login');


    }
}
