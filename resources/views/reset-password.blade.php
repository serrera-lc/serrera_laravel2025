<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Reset Password</title>
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Orbitron&display=swap');

        body {
            background: linear-gradient(135deg, #0f0f0f,rgb(255, 113, 30));
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            font-family: 'Orbitron', sans-serif;
            color: white;
            margin: 0;
        }

        .reset-card {
            background: rgba(20, 20, 20, 0.95);
            padding: 3rem;
            border-radius: 20px;
            box-shadow: 0 0 25px rgba(255, 111, 0, 0.3), 0 0 10px rgba(255, 111, 0, 0.5);
            width: 100%;
            max-width: 450px;
            border: 2px solid rgba(255, 111, 0, 0.8);
            animation: slideIn 1s ease-out;
        }

        @keyframes slideIn {
            0% {
                opacity: 0;
                transform: translateY(-50px);
            }
            100% {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .strength-weak {
            color: #FF3D00; /* Neon red */
        }

        .strength-medium {
            color: #FFB300; /* Neon yellow-orange */
        }

        .strength-strong {
            color: #00FF7F; /* Neon green */
        }

        .btn-primary {
            background-color: #FF6F00;
            border-color: #FF6F00;
            color: white;
            font-weight: bold;
            transition: all 0.3s ease;
            box-shadow: 0 0 15px #FF6F00;
            border-radius: 8px;
            letter-spacing: 1px;
        }

        .btn-primary:hover {
            background-color: #FFAB40;
            border-color: #FFAB40;
            transform: scale(1.05);
            box-shadow: 0 0 25px #FF6F00, 0 0 10px #FF6F00 inset;
        }

        input.form-control {
            background-color: #2E2E2E;
            color: white;
            border: 1px solid #FF6F00;
            border-radius: 6px;
            transition: 0.3s ease;
            padding: 12px;
        }

        input.form-control:focus {
            border-color: #FF6F00;
            box-shadow: 0 0 10px #FF6F00;
            background-color: #1A1A1A;
            color: white;
        }

        label {
            color: #FF6F00;
            font-weight: bold;
            font-size: 1.1rem;
        }

        .alert-danger {
            background-color: #FF3D00;
            color: white;
            border-radius: 6px;
            padding: 1rem;
            font-weight: bold;
        }

        .alert-danger a {
            color: white;
            text-decoration: underline;
        }

        /* Glowing text effect for headings */
        h3 {
            color: #FF6F00;
            text-align: center;
            font-size: 2.5rem;
            text-shadow: 0 0 15px #FF6F00, 0 0 25px #FF6F00, 0 0 35px #FF6F00;
            letter-spacing: 1px;
        }
    </style>
</head>

<body>
    <div class="reset-card">
        <h3 class="mb-4">Reset Your Password</h3>

        @if ($errors->any())
            <div class="alert alert-danger text-center">
                {{ $errors->first() }}
            </div>
        @endif

        <form method="POST" action="{{ route('password.change') }}">
            @csrf
            <input type="hidden" name="token" value="{{ $token }}">

            <div class="mb-3">
                <label for="email" class="form-label">Email Address</label>
                <input type="email" name="email" class="form-control" value="{{ old('email') }}" required>
            </div>

            <div class="mb-3">
                <label for="password" class="form-label">New Password</label>
                <input type="password" id="password" name="password" class="form-control" required>
                <div id="password-strength" class="mt-1 fw-semibold"></div>
            </div>

            <div class="mb-3">
                <label for="password_confirmation" class="form-label">Confirm New Password</label>
                <input type="password" id="password_confirmation" name="password_confirmation" class="form-control" required>
                <div id="password-match" class="mt-1 fw-semibold"></div>
            </div>

            <button type="submit" class="btn btn-primary w-100">Reset Password</button>
        </form>
    </div>

    <script src="{{ asset('js/password-strength.js') }}"></script>
</body>

</html>
