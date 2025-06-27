<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Models\signup;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Mail;


class AuthController extends Controller
{

    public function showForgotPasswordForm() {
        return view('forgot-password');
    }

    public function sendResetLink(Request $request) {
        $request->validate(['email' => 'required|email']);
    
        $status = Password::sendResetLink($request->only('email'));
    
        return $status === Password::RESET_LINK_SENT
            ? back()->with(['status' => __($status)])
            : back()->withErrors(['email' => __($status)]);
    }

    public function showResetPasswordForm($token) {
        return view('reset-password', ['token' => $token]);
    }
    
    public function resetPassword(Request $request) {
        $request->validate([
            'token' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:8|confirmed',
        ]);
    
        $status = Password::reset(
            $request->only('email', 'password', 'password_confirmation', 'token'),
            function ($user, $password) {
                $user->forceFill([
                    'password' => Hash::make($password),
                    'remember_token' => Str::random(60),
                ])->save();
            }
        );
    
        return $status === Password::PASSWORD_RESET
            ? redirect('/login')->with('status', __($status))
            : back()->withErrors(['email' => [__($status)]]);
    }

    public function showOtpRequestForm() {
        return view('otp-email');
    }
    public function sendOtp(Request $request) {
        $request->validate(['email' => 'required|email']);
        $user = signup::where('email', $request->email)->first();
    
        if (!$user) {
            return back()->withErrors(['email' => 'Email not found']);
        }
    
        $otp = rand(100000, 999999);
        Session::put('otp', $otp);
        Session::put('otp_email', $user->email);
    
        Mail::raw("Your OTP for password reset is: $otp", function ($message) use ($user) {
            $message->to($user->email)
                    ->subject("Password Reset OTP");
        });
    
        return redirect('/verify-otp')->with('success', 'OTP sent to your email.');
    }
    
    // Show OTP and new password form
    public function showOtpVerifyForm() {
        return view('otp-verify');
    }
    
    // Verify OTP and reset password
    public function verifyOtpAndResetPassword(Request $request) {
        $request->validate([
            'otp' => 'required',
            'password' => 'required|min:6|confirmed'
        ]);
    
        if ($request->otp != Session::get('otp')) {
            return back()->withErrors(['otp' => 'Invalid OTP']);
        }
    
        $user = signup::where('email', Session::get('otp_email'))->first();
        $user->password = Hash::make($request->password);
        $user->save();
    
        Session::forget('otp');
        Session::forget('otp_email');
    
        return redirect('/login')->with('success', 'Password has been reset successfully.');
    }
}
