<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request; // Importing the Request class
use Illuminate\Support\Facades\Hash; // Importing Hash facade for password hashing
use App\Models\Usersinfo; // Importing the Usersinfo model
use App\Http\Requests\UpdatePasswordRequest; // Importing the request class for updating password
use App\Notifications\ChangePasswordNotification; // Importing the notification class for password change

class PasswordController extends Controller
{
    // Controller for handling password-related actions

    /**
     * Show the password edit form.
     *
     * @return \Illuminate\View\View
     */
    public function edit()
    {
        return view('edit-password'); // Return the password edit view
    }

    /**
     * Update the user's password.
     *
     * @param UpdatePasswordRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UpdatePasswordRequest $request)
    {
        // Retrieve the currently authenticated user
        $user = Usersinfo::find(session('user')->id);
    
        // Check if the user exists and if the old password is correct
        if (!$user || !Hash::check($request->old_password, $user->password)) {
            return back()->withErrors(['old_password' => 'Old password is incorrect.']); // Return error if incorrect
        }
    
        // Hash and set the new password
        $user->password = Hash::make($request->new_password);
        $user->save(); // Save the updated user data
        $user->notify(new ChangePasswordNotification()); // Notify the user of the password change
    
        return back()->with('success', 'Password updated successfully!'); // Return success message
    }
}