<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Password</title>
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@400;700&display=swap" rel="stylesheet">
    <style>
        body {
            background-color: #0d0d0d;
            color: #ffffff;
            font-family: 'Orbitron', sans-serif;
        }

        h2 {
            color: #ff9100;
            text-shadow: 0 0 10px #ff9100;
        }

        label {
            color: #ffcc80;
        }

        .form-control {
            background-color: #1a1a1a;
            color: #fff;
            border: 1px solid #ff9100;
        }

        .form-control:focus {
            border-color: #ffa733;
            box-shadow: 0 0 10px #ff9100;
        }

        .btn-primary {
            background-color: #ff9100;
            border-color: #ff9100;
            color: #000;
            font-weight: bold;
            box-shadow: 0 0 10px #ff9100;
            border-radius: 8px;
        }

        .btn-primary:hover {
            background-color: #ffa733;
            border-color: #ffa733;
            box-shadow: 0 0 15px #ff9100cc;
        }

        /* Neon Toast Styling */
        .toast-container {
            position: fixed;
            top: 1rem;
            right: 1rem;
            z-index: 1080;
            max-width: 350px;
        }

        .toast {
            border-radius: 1rem;
            box-shadow:
                0 0 8px #ff6f00aa,
                0 0 20px #ff6f00cc,
                0 0 30px #ff6f0055,
                inset 0 0 8px #ff6f00cc;
            font-size: 1rem;
            padding: 1rem 1.5rem;
            backdrop-filter: blur(8px);
            -webkit-backdrop-filter: blur(8px);
            background-color: rgba(40, 40, 40, 0.95);
            color: #ffb347;
            border-left: 6px solid #ff6f00;
            font-family: 'Orbitron', sans-serif;
            animation: neonPulse 3s ease-in-out infinite alternate;
        }

        .toast .toast-body {
            font-weight: 600;
            color: #ffb347;
            text-shadow:
                0 0 4px #ff6f00,
                0 0 10px #ff6f00cc;
        }

        .toast.bg-success {
            border-left-color: #ff6f00;
            box-shadow:
                0 0 8px #ff6f00aa,
                0 0 20px #ff6f00cc,
                0 0 30px #ff6f0055,
                inset 0 0 8px #ff6f00cc;
            color: #ffb347;
            background-color: rgba(40, 40, 40, 0.95);
            animation: neonPulse 3s ease-in-out infinite alternate;
        }

        .toast.bg-danger {
            border-left-color: #dc3545;
            box-shadow:
                0 0 8px #dc3545aa,
                0 0 20px #dc3545cc,
                0 0 30px #dc354555,
                inset 0 0 8px #dc3545cc;
            color: #f5a3a3;
            background-color: rgba(70, 30, 30, 0.95);
        }

        @keyframes neonPulse {
            0%, 100% {
                box-shadow:
                    0 0 8px #ff6f00aa,
                    0 0 20px #ff6f00cc,
                    0 0 30px #ff6f0055,
                    inset 0 0 8px #ff6f00cc;
                color: #ffb347;
                border-left-color: #ff6f00;
            }

            50% {
                box-shadow:
                    0 0 14px #ff6f00dd,
                    0 0 30px #ff6f00ee,
                    0 0 45px #ff6f0088,
                    inset 0 0 14px #ff6f00ee;
                color: #fff0b3;
                border-left-color: #ffa733;
            }
        }
    </style>
</head>

<body>
    @include('nav')

    @if (session('success') || $errors->any())
        <div class="toast-container">
            <div class="toast align-items-center text-white {{ session('success') ? 'bg-success' : 'bg-danger' }} border-0 show"
                role="alert" aria-live="assertive" aria-atomic="true">
                <div class="d-flex">
                    <div class="toast-body">
                        @if(session('success'))
                            {{ session('success') }}
                        @else
                            <ul class="mb-0">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        @endif
                    </div>
                    <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast"
                        aria-label="Close"></button>
                </div>
            </div>
        </div>
    @endif

    <div class="container mt-5">
        <h2 class="text-center mb-4">Change Password</h2>
        <form action="{{ route('password.update') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label>Old Password</label>
                <input type="password" name="old_password" class="form-control" required>
            </div>
            <div class="mb-3">
                <label>New Password</label>
                <input type="password" name="new_password" class="form-control" required>
            </div>
            <div class="mb-3">
                <label>Confirm New Password</label>
                <input type="password" name="confirm_password" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary mt-2">Update Password</button>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const toastEl = document.querySelector('.toast');
            if (toastEl) {
                const toast = new bootstrap.Toast(toastEl, { delay: 3000 });
                toast.show();
            }
        });
    </script>
</body>

</html>
