<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class admincontroller extends Controller
{
    
    public function index()
    {
        return view('adminpages.adminsidebar');
    }

    public function dashboard()
    {
        return view('adminpages.admindashboard');
    }

    public function appointments()
    {
        return view('adminpages.adminappointments');
    }

    
    public function services()
    {
        return view('adminpages.adminservices');
    }

    public function blogs()
    {
        return view('adminpages.adminblog');
    }

    public function pricing()
    {
        return view('adminpages.adminpricing');
    }

    public function customers()
    {
        return view('adminpages.admincustomers');
    }

    public function settings()
    {
        return view('adminpages.adminsettings');
    }
    
    public function vendoradmin()
    {
        return view('vendoradmin.vendoradmin');
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
