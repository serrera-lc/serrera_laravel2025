<?php

namespace App\Http\Controllers;

use App\Models\Usersinfo; // Importing the Usersinfo model
use Illuminate\Http\Request; // Importing the Request class
use Illuminate\Support\Facades\Mail; // Importing Mail facade (although not used here)
use Illuminate\Support\Str; // Importing Str facade for string operations
use App\Notifications\ResetPasswordNotification; // Importing the notification class for reset password
use Illuminate\Support\Facades\DB; // Importing DB facade for database operations

class ForgotPasswordController extends Controller
{
    // Controller for handling password reset requests

    /**
     * Show the password reset request form.
     *
     * @return \Illuminate\View\View
     */
    public function showRequestForm()
    {
        return view('forgot-password'); // Return the password reset request view
    }

    /**
     * Send a password reset link to the user's email.
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function sendResetLink(Request $request)
    {
        // Validate the incoming request for email
        $request->validate([
            'email' => 'required|email|exists:usersinfo,email', // Ensure the email exists in the database
        ]);

        // Generate a random token for password reset
        $token = Str::random(64);

        // Insert or update the password reset token in the database
        DB::table('password_resets')->updateOrInsert(
            ['email' => $request->email],
            ['token' => $token, 'created_at' => now()] // Store the token and the current timestamp
        );

        // Retrieve the user by email
        $user = Usersinfo::where('email', $request->email)->first();
        // Send the password reset notification with the token
        $user->notify(new ResetPasswordNotification($token));

        return back()->with('success', 'We have emailed your password reset link!'); // Return success message
    }
}