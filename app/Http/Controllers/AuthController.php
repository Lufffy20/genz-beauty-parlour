<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Models\signup;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Mail;
use Carbon\Carbon;

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

    // Show email input form to request OTP
    public function showOtpRequestForm() {
        return view('otp-email');
    }

    // Send OTP to user's email
    public function sendOtp(Request $request) {
        $request->validate(['email' => 'required|email']);
        $user = signup::where('email', $request->email)->first();

        if (!$user) {
            return back()->withErrors(['email' => 'Email not found']);
        }

        $otp = rand(100000, 999999);
        Session::put('otp', $otp);
        Session::put('otp_email', $user->email);
        Session::put('otp_expires_at', Carbon::now()->addMinute()); // Valid for 1 minute

        Mail::raw("Your OTP for password reset is: $otp", function ($message) use ($user) {
            $message->to($user->email)->subject("Password Reset OTP");
        });

        return redirect('/verify-otp')->with('success', 'OTP sent to your email. OTP is valid for 1 minute.');
    }

    // Show OTP and password form (step-wise)
    public function showOtpVerifyForm() {
        return view('otp-verify');
    }

    // Step-by-step OTP verification + password reset
    public function verifyOtpAndResetPassword(Request $request) {
        // Step 1: OTP verification (password not yet submitted)
        if (!$request->filled('password')) {
            $request->validate(['otp' => 'required']);

            // OTP Expiry Check
            if (now()->greaterThan(Session::get('otp_expires_at'))) {
                return back()->withErrors(['otp' => 'OTP has expired. Please resend OTP.']);
            }

            if ($request->otp != Session::get('otp')) {
                return back()->withErrors(['otp' => 'Invalid OTP']);
            }

            return back()
                ->with('success', 'OTP verified! Please enter your new password.')
                ->withInput(['otp' => $request->otp])
                ->with('show_password_form', true);
        }

        // Step 2: Password Reset
        $request->validate([
            'otp' => 'required',
            'password' => 'required|min:6|confirmed'
        ]);

        // Re-check OTP validity
        if (now()->greaterThan(Session::get('otp_expires_at'))) {
            return back()->withErrors(['otp' => 'OTP has expired. Please resend OTP.']);
        }

        if ($request->otp != Session::get('otp')) {
            return back()->withErrors(['otp' => 'Invalid OTP']);
        }

        $user = signup::where('email', Session::get('otp_email'))->first();
        if (!$user) {
            return back()->withErrors(['otp' => 'User not found.']);
        }

        $user->password = Hash::make($request->password);
        $user->save();

        Session::forget('otp');
        Session::forget('otp_email');
        Session::forget('otp_expires_at');

        return redirect('/login')->with('success', 'Password has been reset successfully.');
    }

    // Resend OTP
    public function resendOtp() {
        $email = Session::get('otp_email');
        if (!$email) {
            return redirect('/forgot-password')->withErrors(['email' => 'Session expired. Please enter email again.']);
        }

        $user = signup::where('email', $email)->first();
        if (!$user) {
            return redirect('/forgot-password')->withErrors(['email' => 'Email not found.']);
        }

        $otp = rand(100000, 999999);
        Session::put('otp', $otp);
        Session::put('otp_expires_at', now()->addMinute());

        Mail::raw("Your new OTP is: $otp", function ($message) use ($user) {
            $message->to($user->email)->subject("New OTP for Password Reset");
        });

        return redirect('/verify-otp')->with('success', 'New OTP sent to your email. It is valid for 1 minute.');
    }
}
