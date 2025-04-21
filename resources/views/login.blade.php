<!DOCTYPE html>
<<<<<<< HEAD
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/login.css">
    <style>
        
    </style>
</head>
<body>
    <div class="login-container">
    <form method="POST" action="{{ route('login') }}">
    @csrf
    <h2>Login</h2>

    <div class="form-group">
        <label for="username">Username</label>
        <input type="text" id="username" name="username" required>
    </div>
    <div class="form-group">
        <label for="password">Password</label>
        <input type="password" id="password" name="password" required>
    </div>
    
    <button type="submit" class="btn btn-primary">Submit</button>
    <a href="{{ route('register') }}" class="btn btn-outline-secondary">Register</a>
</form>
    </div>
</body>
</html>
=======
<html>
<head>
    <title>Login</title>
</head>
<body>
    <form action="{{ route('login.post') }}" method="POST">
        @csrf
        <label for="username">Username:</label>
        <input type="text" name="username" required>
        
        <label for="password">Password:</label>
        <input type="password" name="password" required>

        <button type="submit">Login</button>
    </form>
    @if($errors->has('login'))
        <p>{{ $errors->first('login') }}</p>
    @endif
</body>
</html>
>>>>>>> 3565232c3feebc5dea729802e15a161d096a2c8c
