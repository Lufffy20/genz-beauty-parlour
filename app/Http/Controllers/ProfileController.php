<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function editprofile()
    {
        return view('editprofile');
    }

    public function update(Request $request)
    {
        $user = Auth::user();
    
        if ($request->hasFile('profile_picture')) {
            $file = $request->file('profile_picture');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            
            // Store the image in 'public/images'
            $file->storeAs('public/images', $filename);
    
            // Save the correct path in the database
            $user->profile_picture = $filename;
        }
    
        $user->name = $request->name;
        $user->email = $request->email;
        $user->save();
    
        return redirect()->back()->with('status', 'Profile updated successfully!');
    }
    
    
}
