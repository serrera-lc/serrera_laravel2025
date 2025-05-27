<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterUserRequest; // Importing the request class for user registration
use App\Models\Usersinfo; // Importing the Usersinfo model
use Illuminate\Support\Str; // Importing Str facade for string operations
use Illuminate\Support\Facades\Hash; // Importing Hash facade for password hashing
use App\Notifications\VerifyEmail; // Importing the notification class for email verification

class RegistrationController extends Controller
{
    /**
     * Save a new user registration.
     *
     * @param RegisterUserRequest $request
     * @return \Illuminate\View\View
     */
    public function save(RegisterUserRequest $request)
    {
        // Create a new user instance
        $user = new Usersinfo;
        $user->id = Str::uuid(); // Generate a unique ID for the user
        $user->first_name = $request->firstname; // Set first name
        $user->last_name = $request->lastname; // Set last name
        $user->sex = $request->sex; // Set gender
        $user->birthday = $request->bod; // Set date of birth
        $user->username = $request->username; // Set username
        $user->email = $request->email; // Set email
        $user->password = Hash::make($request->password); // Hash the password
        $user->verification_token = Str::random(64); // Generate a verification token
        $user->save(); // Save the user to the database

        // Send verification email to the user
        $user->notify(new VerifyEmail($user->verification_token));

        return view('registration-success', ['user' => $user]); // Return success view with user data
    }

    /**
     * Verify the user's email address using the token.
     *
     * @param string $token
     * @return \Illuminate\Http\RedirectResponse
     */
    public function verifyEmail($token)
    {
        // Find the user by verification token
        $user = Usersinfo::where('verification_token', $token)->firstOrFail();

        // Update the user's email verification status
        $user->email_verified_at = now();
        $user->verification_token = null; // Clear the verification token
        $user->save(); // Save the changes

        return redirect()->route('login')->with('success', 'Email verified! You can now log in.'); // Redirect after verification
    }
}