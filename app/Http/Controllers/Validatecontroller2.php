<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\signup;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class Validatecontroller2 extends Controller
{
    public function signup()
    {
        return view('signup');
    }

    // Login Code
    public function store2(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        Log::info('Login Attempt:', ['email' => $request->email]);

        $credentials = $request->only('email', 'password');

        // ✅ Try to authenticate as a vendor
        if (Auth::guard('vendor')->attempt($credentials)) {
            $user = Auth::guard('vendor')->user();

            if ($user->role_as == 2) {
                Auth::guard('vendor')->login($user); // ✅ Set session for vendor
                return redirect()->route('Dashboard1.page')->with([
                    'success' => 'Vendor Login successful',
                    'username' => $user->name
                ]);
            }
        }

        // ✅ Try to authenticate as an admin/user
        if (Auth::guard('web')->attempt($credentials)) {
            $user = Auth::guard('web')->user();

            Auth::guard('web')->login($user); // ✅ Set session for web guard
            
            if ($user->role_as == 1) {
                return redirect()->route('homepage')->with([
                    'success' => 'User Login successful',
                    'username' => $user->name
                ]);
            } elseif ($user->role_as == 0) {
                return redirect()->route('Dashboard.page')->with([
                    'success' => 'Admin Login successful',
                    'username' => $user->name
                ]);
            }

        }

        // ❌ Login failed
        Log::error('Invalid login attempt', ['email' => $request->email]);
        return redirect()->back()->with('error', 'Invalid email or password');
    }
}
