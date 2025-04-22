<?php

namespace App\Http\Controllers;

use App\Models\Usersinfo;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
class RegistrationController extends Controller
{
    //

    public function save(Request $request)
    {
        $user = new Usersinfo;
        $user->id = Str::uuid();
        $user->first_name = $request->firstname;
        $user->last_name = $request->lastname;
        $user->sex = $request->sex;
        $user->birthday = $request->bod;
        $user->username = $request->username;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->save();

        return redirect()->route('login')->with('success', 'Registered successfully');

    }

}