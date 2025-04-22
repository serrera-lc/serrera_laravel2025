<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PasswordController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UploadController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// Home Route
Route::get('/', function () {
    return view('welcome');
});

// 🔐 Login Routes
Route::get('/login', function () {
    return view('login');
})->name('login');

Route::post('/login', function (Request $request) {
    $credentials = $request->validate([
        'username' => 'required|string',
        'password' => 'required|string',
    ]);

    // Simulated login
    if ($credentials['username'] === 'admin' && $credentials['password'] === 'password') {
        session(['logged_in' => true]);
        return redirect()->route('dashboard');
    }

    return back()->withErrors(['login' => 'Invalid username or password.']);
})->name('login.post');

// 📝 Registration Routes
Route::get('/register', function () {
    return view('registration');
})->name('register');

Route::post('/register', function (Request $request) {
    $request->validate([
        'first_name' => 'required|string',
        'last_name' => 'required|string',
        'sex' => 'required|string|in:Male,Female',
        'birthday' => 'required|date',
        'username' => 'required|string|unique:users,username',
        'email' => 'required|email|unique:users,email',
        'terms' => 'accepted',
    ]);

    return view('registration-success', [
        'firstName' => $request->input('first_name'),
        'lastName' => $request->input('last_name'),
        'sex' => $request->input('sex'),
        'birthday' => $request->input('birthday'),
        'username' => $request->input('username'),
        'email' => $request->input('email'),
    ]);
})->name('register.post');

// 🏠 Dashboard Route (protected)
Route::get('/dashboard', function () {
    if (!session('logged_in')) {
        return redirect()->route('login');
    }
    return view('dashboard');
})->name('dashboard');

// Controller routes for profile and password management
Route::get('/edit-profile', [ProfileController::class, 'edit'])->name('profile.edit');
Route::post('/edit-profile', [ProfileController::class, 'update'])->name('profile.update');

Route::get('/edit-password', [PasswordController::class, 'edit'])->name('password.edit');
Route::post('/edit-password', [PasswordController::class, 'update'])->name('password.update');

// Controller route for displaying users
Route::get('/users', [UserController::class, 'index'])->name('user.list');

// 📁 File Upload Routes (uses middleware)
Route::middleware('check.logged.in')->group(function () {
    Route::get('/uploads', [UploadController::class, 'index'])->name('uploads.index');
    Route::post('/uploads', [UploadController::class, 'store'])->name('uploads.store');
    Route::get('/uploads/download/{id}', [UploadController::class, 'download'])->name('uploads.download');
});

// 🔓 Logout Route
Route::post('/logout', function () {
    session()->forget('logged_in');
    return redirect()->route('login');
})->name('logout');