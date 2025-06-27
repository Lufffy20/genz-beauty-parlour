<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Newsletter;

class NewsletterController extends Controller
{
    public function store12(Request $request)
    {
        $request->validate([
            'Email' => 'required|email|unique:newsletters,email',
        ]);

        Newsletter::create([
            'email' => $request->Email,
        ]);

        return redirect()->back()->with('success', 'Thanks for subscribing!');
    }
}
