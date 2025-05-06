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
            background-color: #1a1a1a; /* Dark background */
            color: #f4f4f4; /* Light text for readability */
            font-family: 'Orbitron', sans-serif; /* Apply Orbitron font */
        }

        .container {
            max-width: 400px;
        }

        .card {
            background-color: #333; /* Dark card background */
            box-shadow: 0 0 15px rgba(255, 87, 34, 0.7); /* Darker neon orange shadow */
            border-radius: 10px;
            padding: 2rem;
        }

        .form-control {
            background-color: #444; /* Dark input background */
            color: #f4f4f4; /* Light text in inputs */
            border-radius: 10px;
            padding: 1rem;
            border: 2px solid #FF6F00; /* Darker neon orange border */
        }

        .form-control.is-invalid {
            border-color: #FF5722; /* Darker neon orange for invalid input */
            box-shadow: 0 0 5px rgba(255, 87, 34, 0.8); /* Darker neon orange glow */
        }

        .btn-primary {
            background-color: #FF5722; /* Darker neon orange */
            border: none;
            box-shadow: 0 0 10px rgba(255, 87, 34, 0.7); /* Darker neon glow */
        }

        .btn-primary:hover {
            background-color: #e64a19; /* Slightly darker shade on hover */
        }

        .alert-success {
            background-color: #4CAF50; /* Success green */
            border-color: #4CAF50;
        }

        .alert-danger {
            background-color: #FF5722; /* Darker neon orange for error */
            border-color: #FF5722;
        }

        .invalid-feedback {
            color: #FF5722; /* Darker neon orange error message */
        }

        h3 {
            color: #FF6F00; /* Neon orange heading */
            font-weight: 700; /* Bold heading */
        }

        .btn-secondary {
            background-color: #555; /* Darker button */
            border-color: #444; /* Dark border */
        }

        .btn-secondary:hover {
            background-color: #666; /* Slightly lighter shade on hover */
        }
    </style>
</head>
<body>
    
    <div class="container mt-5">
        <a class="btn btn-secondary" href="{{ route('login') }}">Go back</a>
        <br><br>

        <h3 class="mb-4">Verify Your Email</h3>

        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        @if ($errors->any())
            <div class="alert alert-danger">{{ $errors->first() }}</div>
        @endif

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
