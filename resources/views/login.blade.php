<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet"> <!-- Bootstrap CSS -->
    <link href="{{ asset('css/login.css') }}" rel="stylesheet"> <!-- Custom CSS for login -->
</head>

<body>
    <div class="card">
        <h2 class="text-center mb-4">Login</h2> <!-- Login title -->

        @if (session('success')) <!-- Check for success message -->
            <div class="alert alert-success text-center">
                {{ session('success') }} <!-- Display success message -->
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf <!-- CSRF protection -->
            <div class="mb-3">
                <label for="username" class="form-label">Username</label>
                <input type="text" name="username" class="form-control" id="username" value="{{ old('username') }}"> <!-- Username input -->
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" name="password" class="form-control" id="password"> <!-- Password input -->
            </div>
            <button type="submit" class="btn btn-primary w-100">Login</button> <!-- Login button -->
        </form>

        <div class="d-flex justify-content-center mt-3">
            <a href="{{ route('password.request') }}" class="mx-3">Forgot Password?</a> <!-- Link to password recovery -->
            <a href="{{ route('verify.email.form') }}" class="mx-3">Verify Your Email</a> <!-- Link to email verification -->
        </div>

        <p class="text-center mt-3">
            <a href="{{ route('register') }}">Don't have an account? Register</a> <!-- Link to registration -->
        </p>

        @if($errors->any()) <!-- Check for validation errors -->
            <div class="mt-3">
                @if ($errors->has('email')) <!-- Specific error for email -->
                    <div class="alert alert-warning text-center">
                        {{ $errors->first('email') }} <!-- Display email error -->
                    </div>
                @else
                    <div class="alert alert-warning text-danger text-center">{{ $errors->first() }}</div> <!-- Display general error -->
                @endif
            </div>
        @endif
    </div>
</body>

</html>