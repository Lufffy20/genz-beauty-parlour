<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Mail\VerificationCodeMail;
use App\Models\signup;
use Carbon\Carbon;

class Validatecontroller1 extends Controller
{
    // Show login form
    public function login()
    {
        return view('login');
    }

    // Optional: Show signup form (in case you need it)
    public function signupForm()
    {
        return view('signup');
    }

    // Handle Signup - send OTP
    public function store1(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:signups,email',
            'password' => 'required|min:6|confirmed',
        ]);

        $code = rand(100000, 999999);

        // Store user data & code in session
        Session::put('user_data', [
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password,
        ]);
        Session::put('verify_code', $code);

        // Send code to email
        Mail::to($request->email)->send(new VerificationCodeMail($code));

        return redirect()->route('code.form')->with('message', 'Verification code sent to your email.');
    }

    // Show code input form
    public function showCodeForm()
    {
        return view('verify-code');
    }

    // ✅ Handle OTP verification and user creation
    public function verifyCode(Request $request)
    {
        $request->validate([
            'code' => 'required|digits:6',
        ]);

        $storedCode = Session::get('verify_code');
        $userData = Session::get('user_data');

        if ($request->code == $storedCode && $userData) {
            $signup = new signup();
            $signup->name = $userData['name'];
            $signup->email = $userData['email'];
            $signup->password = Hash::make($userData['password']);
            $signup->email_verified_at = Carbon::now(); // ✅ Mark email as verified
            $signup->save();

            // Clear session
            Session::forget('verify_code');
            Session::forget('user_data');

            return redirect('/login')->with('success', 'Signup successful. You can now login.');
        } else {
            return back()->withErrors(['code' => 'Incorrect verification code.']);
        }
    }

    // Handle Login with email verification check
    public function loginUser(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $user = Auth::user();

            if ($user->email_verified_at !== null) {
                return redirect('/');
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
