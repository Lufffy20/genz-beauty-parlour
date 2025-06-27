<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\login;
use App\Models\signup;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class Validatecontroller1 extends Controller
{
    public function login()
    {
        return view('login');
    }

    //Signup code to store data 
    public function store1(Request $request){
        $request->validate([
            'email'=>'required',
            'password'=>'required',
        ]);

        
        Log::info('Login Attempt:', ['email' => $request->email , 'password' => $request->password]);
          
        $credentials = $request->only('email', 'password');

        $signup =new signup();
        $signup->name=$request['name'];
        $signup->email=$request['email'];
        $signup->password=Hash::make($request->input('password'));
        $signup->save();
    return redirect('/login');
}
public function logout(Request $request)
    {

        // $request->session()->forget('customer_id');
        // $request->session()->forget('success');
        // $request->session()->forget('username');
        Auth::logout();
        return redirect('/');
    }

}


