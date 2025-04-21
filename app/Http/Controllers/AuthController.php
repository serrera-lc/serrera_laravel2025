<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\Usersinfo;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        // Find user by username
        $user = Usersinfo::where('username', $request->username)->first();

        if ($user && Hash::check($request->password, $user->password)) {
            // Store user ID in session instead of full user object
            session(['user_id' => $user->id]);

            return redirect()->route('dashboard');
        }

        return back()->withErrors([
            'username' => 'Invalid username or password.',
        ]);
    }

    public function register(Request $request)
    {
        // Validate the form data
        $validated = $request->validate([
            'firstname' => 'required|string|max:255',
            'middlename' => 'nullable|string|max:255',
            'lastname' => 'required|string|max:255',
            'bod' => 'required|date',
            'sex' => 'required|in:Male,Female',
            'email' => 'required|email|unique:usersinfos,email',
            'username' => 'required|string|unique:usersinfos,username',
            'password' => 'required|string|min:8',
            'terms' => 'required',
        ]);

        // Create the new user
        $user = Usersinfo::create([
            'first_name' => $validated['firstname'],
            'middle_name' => $validated['middlename'],
            'last_name' => $validated['lastname'],
            'date_of_birth' => $validated['bod'],
            'sex' => $validated['sex'],
            'email' => $validated['email'],
            'username' => $validated['username'],
            'password' => Hash::make($validated['password']),
        ]);

        // Log the user in
        session(['user_id' => $user->id]);

        // Redirect to dashboard
        return redirect()->route('dashboard')->with('success', 'Registration successful!');
    }
}