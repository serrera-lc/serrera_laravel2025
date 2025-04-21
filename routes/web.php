<?php

<<<<<<< HEAD
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PasswordController;
use App\Http\Controllers\UserController;

Route::get('/', function () {
    return view('welcome');
});



Route::get('/login', function () {
    return view('login'); 
})->name('login');

//login Controller
Route::post('/login', [AuthController::class, 'login'])->name('login');


Route::get('/dashboard', function (){
    return view('dashboard');
})->name('dashboard');

Route::get('/register', function () {
    return view('registration');
})->name('register');

//REGISTRATION CONTROLLER --  TODO: MOVE TO A CONTROLLER FOR A BETTER CODE AYAW KALIMTA.

Route::post('/register', function (Request $request) {
    // not including password
    $data = $request->except('password');

    return view('registration-success', ['data' => $data]);
});


//Controller for editing name and username
Route::get('/edit-profile', [ProfileController::class, 'edit'])->name('profile.edit');
Route::post('/edit-profile', [ProfileController::class, 'update'])->name('profile.update');


//Controller for changeing password

Route::get('/edit-password', [PasswordController::class, 'edit'])->name('password.edit');
Route::post('/edit-password', [PasswordController::class, 'update'])->name('password.update');

//Controller route for display user
Route::get('/users', [UserController::class, 'index'])->name('user.list');
=======
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UploadController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// 🏠 Dashboard (protected)
Route::get('/dashboard', function () {
    if (!session('logged_in')) {
        return redirect()->route('login');
    }
    return view('dashboard');
})->name('dashboard');

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
    return view('register');
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

    return view('registration_success', [
        'firstName' => $request->input('first_name'),
        'lastName' => $request->input('last_name'),
        'sex' => $request->input('sex'),
        'birthday' => $request->input('birthday'),
        'username' => $request->input('username'),
        'email' => $request->input('email'),
    ]);
})->name('register.post');

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
>>>>>>> 3565232c3feebc5dea729802e15a161d096a2c8c
