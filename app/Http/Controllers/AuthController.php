<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function create()
    {
        return view('/auth/login');
    }

    public function store(Request $request)
    {
        $map = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);


        if (Auth::attempt($map)) {
            return redirect()->route('dashboard')->with('success', 'Login successful!');
        } else {
            return redirect()->back()->withInput()->withErrors(['invalid_credentials' => 'Invalid credentials. Check the email address and password entered.']);
        }
    }
}
