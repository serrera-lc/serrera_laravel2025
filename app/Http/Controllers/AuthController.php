<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest; // Importing the LoginRequest for validation
use Illuminate\Http\Request; // Importing the Request class
use Illuminate\Support\Facades\Hash; // Importing Hash facade for password hashing
use App\Models\Usersinfo; // Importing the Usersinfo model

class AuthController extends Controller
{
    // Controller for handling authentication-related actions

    /**
     * Handle the user login request.
     *
     * @param LoginRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function login(LoginRequest $request)
    {
        // Retrieve the user by username
        $user = Usersinfo::where('username', $request->username)->first();
    
        // Check if user exists and the password is correct
        if ($user && Hash::check($request->password, $user->password)) {
            // Check if the user's email is verified
            if (is_null($user->email_verified_at)) {
                return back()->withErrors([
                    'email' => 'Please verify your email before logging in.',
                ])->withInput(); // Return error if not verified
            }
    
            // Store user in session
            session(['user' => $user]);
            return redirect()->route('dashboard'); // Redirect to dashboard
        }
    
        // Return error if login fails
        return back()->withErrors([
            'username' => 'Invalid username or password.',
        ]);
    }
    
    /**
     * Show the login form.
     *
     * @return \Illuminate\View\View
     */
    public function showLoginForm()
    {
        return view('login'); // Return the login view
    }

    /**
     * Verify the email using the given token.
     *
     * @param string $token
     * @return \Illuminate\Http\RedirectResponse
     */
    public function verifyEmail($token)
    {
        // Find user by verification token
        $user = Usersinfo::where('verification_token', $token)->firstOrFail();
    
        // Update user's email verification status
        $user->email_verified_at = now();
        $user->verification_token = null; // Clear the verification token
        $user->save();
    
        return redirect()->route('login')->with('success', 'Email verified! You can now log in.'); // Redirect after verification
    }
}