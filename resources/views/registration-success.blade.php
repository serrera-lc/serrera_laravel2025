<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Basic metadata and responsive design -->
    <meta charset="UTF-8">
    <title>Registration Success</title>

    <!-- Bootstrap CSS for styling -->
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">

    <!-- Custom embedded styling -->
    <style>
        /* Overall body styling for neon theme */
        body {
            background-color: #0d0d0d;
            color: #fff;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        /* Styled success alert box */
        .alert-success {
            background-color: #1a1a1a;
            border: 2px solid #ff9100;
            box-shadow: 0 0 20px #ff910088;
            border-radius: 12px;
            padding: 2rem;
        }

        /* Header styling */
        h4 {
            color: #ff9100;
            text-shadow: 0 0 10px #ff9100;
            font-weight: bold;
        }

        /* Paragraph text styling */
        p {
            font-size: 1.1rem;
        }

        /* Primary button custom style */
        .btn-primary {
            background-color: #ff9100;
            border-color: #ff9100;
            color: #000;
            font-weight: bold;
            box-shadow: 0 0 10px #ff9100;
            border-radius: 8px;
        }

        /* Button hover effect */
        .btn-primary:hover {
            background-color: #ffa733;
            border-color: #ffa733;
            box-shadow: 0 0 15px #ff9100cc;
        }

        /* Remove underline from button links */
        a.btn {
            text-decoration: none;
        }
    </style>
</head>

<body>

    <!-- Main container for success message -->
    <div class="container mt-5">
        <div class="alert alert-success text-center">
            <!-- Title -->
            <h4 class="mb-3">Registration Successful!</h4>

            <!-- User information -->
            <p><strong>Username:</strong> {{ $user->username }}</p>
            <p><strong>Full Name:</strong> {{ $user->first_name }} {{ $user->last_name }}</p>

            <!-- Info reminder -->
            <p>Please check your email to verify your account before logging in.</p>

            <!-- Link to login page -->
            <a href="{{ route('login') }}" class="btn btn-primary mt-3">Go to Login</a>
        </div>
    </div>

</body>

</html>
