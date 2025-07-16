<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\signup;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Auth\Events\Registered;

class Validatecontroller1 extends Controller
{
    // Show login form
    public function login()
    {
        return view('login');
    }

    // Show signup form (optional)
    public function signupForm()
    {
        return view('signup');
    }

    // Handle Signup
    public function store1(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:signups,email',
            'password' => 'required|min:6',
        ]);

        $signup = new signup();
        $signup->name = $request->name;
        $signup->email = $request->email;
        $signup->password = Hash::make($request->password);
        $signup->save();

        // 🔔 Send email verification
        event(new Registered($signup));

        return redirect('/login')->with('message', 'Signup successful! Please verify your email before logging in.');
    }

    // Handle Login
    public function loginUser(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $user = Auth::user();

            if ($user->hasVerifiedEmail()) {
                return redirect('/dashboard');
            } else {
                Auth::logout();
                return redirect('/login')->with('error', 'Please verify your email before logging in.');
            }
        }

        return redirect('/login')->with('error', 'Invalid credentials.');
    }

    // Logout
    public function logout(Request $request)
    {
        Auth::logout();
        return redirect('/');
    }
}
