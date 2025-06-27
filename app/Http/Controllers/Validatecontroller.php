<?php

namespace App\Http\Controllers;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Customer;
use App\Mail\ContactMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Hash;


class Validatecontroller extends Controller
{
    public function contact()
    {
        return view('contact');
    }

    public function store(Request $request){
        $request->validate([
        'first_name'=>'required',
        'last_name'=>'required',
        'email'=>'required',
        'phone'=>'required',
        'subject'=>'required',
        'message'=>'required',
        ]);

        $customer =new Customer();
        $customer->first_name=$request['first_name'];
        $customer->last_name=$request['last_name'];
        $customer->email=$request['email'];
        $customer->phone=$request['phone'];
        $customer->subject=$request['subject'];
        $customer->message=$request['message'];
       // $customer->password=Hash::make($request->input('your_pass'));
        $customer->save();
        Mail::to($customer->email)->send(new ContactMail($customer->email, $customer->message,$customer->subject));
        return redirect()->back();
}
}
