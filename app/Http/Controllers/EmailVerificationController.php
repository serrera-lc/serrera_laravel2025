<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request; // Importing the Request class
use Illuminate\Support\Str; // Importing Str facade for string operations
use App\Models\Usersinfo; // Importing the Usersinfo model
use App\Notifications\EmailVerificationNotification; // Importing the notification class

class EmailVerificationController extends Controller
{
    /**
     * Show the email verification request form.
     *
     * @return \Illuminate\View\View
     */
    public function showVerificationForm()
    {
        return view('verify-request'); // Return the verification request view
    }

    /**
     * Send a verification email to the user.
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function sendVerificationEmail(Request $request)
    {
        // Validate the incoming request for email
        $request->validate([
            'email' => 'required|email|exists:usersinfo,email',
        ]);

        // Retrieve the user by email
        $user = Usersinfo::where('email', $request->email)->first();

        // Check if the email is already verified
        if ($user->email_verified_at) {
            return back()->with('success', 'Your email is already verified.'); // Return success message
        }

        // Generate a random verification token
        $user->verification_token = Str::random(60);
        $user->save(); // Save the token to the user record

        // Send the verification email
        $user->notify(new EmailVerificationNotification($user->verification_token));

        return back()->with('success', 'Verification email sent! Please check your inbox.'); // Return success message
    }

    /**
     * Verify the token received in the email.
     *
     * @param string $token
     * @return \Illuminate\Http\RedirectResponse
     */
    public function verifyToken($token)
    {
        // Find the user by verification token
        $user = Usersinfo::where('verification_token', $token)->firstOrFail();

        // Update the user's email verification status
        $user->email_verified_at = now();
        $user->verification_token = null; // Clear the verification token
        $user->save(); // Save the changes

        return redirect()->route('login')->with('success', 'Email verified successfully!'); // Redirect after verification
    }
}