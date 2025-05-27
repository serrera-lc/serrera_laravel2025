<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request; // Importing the Request class
use App\Models\Usersinfo; // Importing the Usersinfo model
use App\Http\Requests\UpdateProfileRequest; // Importing the request class for updating profile

class ProfileController extends Controller
{
    // Controller for handling user profile actions

    /**
     * Show the profile edit form.
     *
     * @return \Illuminate\View\View
     */
    public function edit()
    {
        return view('edit-profile'); // Return the profile edit view
    }

    /**
     * Update the user's profile information.
     *
     * @param UpdateProfileRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UpdateProfileRequest $request)
    {
        // Retrieve the currently authenticated user
        $user = Usersinfo::find(session('user')->id);

        if ($user) {
            // Update user information from the request
            $user->first_name = $request->first_name;
            $user->last_name = $request->last_name;
            $user->username = $request->username;
            $user->save(); // Save the updated user data
    
            session(['user' => $user]); // Update the session with new user data
    
            return back()->with('success', 'Profile updated successfully!'); // Return success message
        }
    
        return back()->withErrors(['user' => 'User not found.']); // Return error if user not found
    }
}