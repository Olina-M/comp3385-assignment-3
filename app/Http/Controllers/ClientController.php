<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Client;

class ClientController extends Controller
{

    public function create()
    {
        return view('clients.add');
    }

    public function store(Request $request)
    {
        // Validate form data, including file upload validation
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:clients,email',
            'phone' => 'required',
            'address' => 'required',
            'company_logo' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', 
        ]);

        // Handle file upload
        $logoPath = $request->file('company_logo');
        $logoPath->storeAs('logos', $logoPath->getClientOriginalName(), 'public');

        // Save client information to the database
        $client = new Client;
        $client->name = $request->name;
        $client->email = $request->email;
        $client->telephone = $request->phone; // corrected the field name
        $client->address = $request->address;
        $client->company_logo = $logoPath->getClientOriginalName(); // corrected the variable name
        $client->save();

        return redirect('/dashboard')->with('success', 'Client added successfully!');
    }
}
