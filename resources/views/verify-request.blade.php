<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Verify Your Email</title>
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <!-- Adding Orbitron font from Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@400;500;700&display=swap" rel="stylesheet">
    <style>
        /* Darker Neon Orange Theme */
        body {
            background-color: #1a1a1a; /* Dark background for the body */
            color: #f4f4f4; /* Light text for readability */
            font-family: 'Orbitron', sans-serif; /* Apply Orbitron font */
        }

        .container {
            max-width: 400px; /* Set max width for the container */
        }

        .card {
            background-color: #333; /* Dark card background */
            box-shadow: 0 0 15px rgba(255, 87, 34, 0.7); /* Darker neon orange shadow */
            border-radius: 10px; /* Rounded corners for the card */
            padding: 2rem; /* Padding inside the card */
        }

        .form-control {
            background-color: #444; /* Dark input background */
            color: #f4f4f4; /* Light text in inputs */
            border-radius: 10px; /* Rounded corners for inputs */
            padding: 1rem; /* Padding inside inputs */
            border: 2px solid #FF6F00; /* Darker neon orange border */
        }

        .form-control.is-invalid {
            border-color: #FF5722; /* Darker neon orange for invalid input */
            box-shadow: 0 0 5px rgba(255, 87, 34, 0.8); /* Darker neon orange glow */
        }

        .btn-primary {
            background-color: #FF5722; /* Darker neon orange for primary button */
            border: none; /* No border for the button */
            box-shadow: 0 0 10px rgba(255, 87, 34, 0.7); /* Darker neon glow */
        }

        .btn-primary:hover {
            background-color: #e64a19; /* Slightly darker shade on hover */
        }

        .alert-success {
            background-color: #4CAF50; /* Success green background */
            border-color: #4CAF50; /* Border color for success alert */
        }

        .alert-danger {
            background-color: #FF5722; /* Darker neon orange for error alert */
            border-color: #FF5722; /* Border color for error alert */
        }

        .invalid-feedback {
            color: #FF5722; /* Darker neon orange for error messages */
        }

        h3 {
            color: #FF6F00; /* Neon orange for heading */
            font-weight: 700; /* Bold heading */
        }

        .btn-secondary {
            background-color: #555; /* Darker secondary button */
            border-color: #444; /* Dark border for secondary button */
        }

        .btn-secondary:hover {
            background-color: #666; /* Slightly lighter shade on hover */
        }
    </style>
</head>
<body>
    
    <div class="container mt-5">
        <!-- Button to navigate back to login -->
        <a class="btn btn-secondary" href="{{ route('login') }}">Go back</a>
        <br><br>

        <h3 class="mb-4">Verify Your Email</h3>

        <!-- Display success message if present -->
        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <!-- Display error message if there are any errors -->
        @if ($errors->any())
            <div class="alert alert-danger">{{ $errors->first() }}</div>
        @endif

        <!-- Form to send verification email -->
        <form action="{{ route('verify.email.send') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label>Email Address</label>
                <input type="email" name="email" class="form-control" required>
            </div>
            <button class="btn btn-primary w-100">Send Verification Email</button>
        </form>
    </div>

</body>
</html>