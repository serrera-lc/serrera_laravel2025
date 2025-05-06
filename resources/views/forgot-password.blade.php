<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot Password</title>
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

        .invalid-feedback {
            color: #FF5722; /* Darker neon orange error message */
        }

        h3 {
            color: #FF6F00; /* Neon orange heading */
            font-weight: 700; /* Bold heading */
        }
    </style>
</head>

<body>

    <div class="container mt-5">
        <div class="card p-4">
            <h3 class="text-center mb-4">Forgot Password</h3>

            @if (session('success'))
                <div class="alert alert-success text-center">{{ session('success') }}</div>
            @endif

            <form method="POST" action="{{ route('password.email') }}">
                @csrf
                <div class="mb-3">
                    <label for="email" class="form-label">Enter your email address</label>
                    <input type="email" name="email" class="form-control @error('email') is-invalid @enderror"
                        value="{{ old('email') }}" required>
                    @error('email')
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary w-100">Send Reset Link</button>
            </form>
        </div>
    </div>

</body>

</html>
