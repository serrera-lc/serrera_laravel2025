<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usersinfo;

use App\Exports\UsersExport;
use Maatwebsite\Excel\Facades\Excel;

use App\Models\Upload;
use Carbon\Carbon;


class UserController extends Controller
{
    //
    public function index(Request $request)
    {
        $currentUser = session('user');
        if (!$currentUser || $currentUser->user_type !== 'Admin') {
            abort(403, 'Access denied');
        }

        $query = Usersinfo::query();

        if ($request->filled('name')) {
            $query->where(function ($q) use ($request) {
                $q->where('first_name', 'like', "%{$request->name}%")
                    ->orWhere('last_name', 'like', "%{$request->name}%");
            });
        }

        if ($request->filled('email')) {
            $query->where('email', 'like', "%{$request->email}%");
        }

        $users = $query->paginate(10)->withQueryString();

        return view('user-list', compact('users'));
    }


  // Your destroy method stays the same:
public function destroy($id)
{
    $currentUser = session('user');

    if (!$currentUser || $currentUser->user_type !== 'Admin') {
        abort(403, 'Access denied');
    }

    if ($currentUser->id == $id) {
        return back()->withErrors(['delete' => 'You cannot delete your own account.']);
    }

    $user = Usersinfo::find($id);

    if (!$user) {
        return back()->withErrors(['delete' => 'User not found.']);
    }

    $hasUploads = Upload::where('uploaded_by', $id)->exists();

    if ($hasUploads) {
        return back()->withErrors(['delete' => 'Cannot delete user with existing uploads.']);
    }

    $user->delete();

    return back()->with('success', 'User deleted successfully.');
}



    public function export(Request $request)
    {
        $currentUser = session('user');

        if (!$currentUser || $currentUser->user_type !== 'Admin') {
            abort(403, 'Access denied');
        }

        return Excel::download(new UsersExport($request), 'users.csv');
    }








}