<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserDashboardController extends Controller
{
    public function index(){
        $username = Auth::user()->name;
    return view('user.dashboard');
    }
}
