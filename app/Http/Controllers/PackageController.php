<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Service;
use App\Models\Package;


class PackageController extends Controller
{
    
    public function index(){
        // return Member::all();
        return Service::with('getPackage')->get();

    }

    public function index2(){

        // return Member::with('getGroup')->get();
        // return Group::get();
        // return Group::with('member')->get();

        $data = Service::with('getpackage')->get();
        return view('show',compact('data'));


    }
}
