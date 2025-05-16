<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <title>Edit Profile</title>
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}" />
    <style>
        /* Neon orange toast styling */
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

        /* Apply neon orange style for success */
        .toast.bg-success {
            border-left-color: #ff6f00; /* neon orange */
            box-shadow:
                0 0 8px #ff6f00aa,
                0 0 20px #ff6f00cc,
                0 0 30px #ff6f0055,
                inset 0 0 8px #ff6f00cc;
            color: #ffb347;
            background-color: rgba(40, 40, 40, 0.95);
            animation: neonPulse 3s ease-in-out infinite alternate;
        }

        /* Changed danger to match neon orange style */
        .toast.bg-danger {
            border-left-color: #ff6f00; /* neon orange */
            box-shadow:
                0 0 8px #ff6f00aa,
                0 0 20px #ff6f00cc,
                0 0 30px #ff6f0055,
                inset 0 0 8px #ff6f00cc;
            color: #ffb347;
            background-color: rgba(40, 40, 40, 0.95);
            animation: neonPulse 3s ease-in-out infinite alternate;
        }

        @keyframes neonPulse {
            0%,
            100% {
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

    <br />
    <div class="container">
        <h2>Edit Profile</h2>
        <form action="{{ route('profile.update') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="first_name" class="form-label">First Name:</label>
                <input type="text" class="form-control" id="first_name" name="first_name"
                    value="{{ session('user')->first_name }}" required />
            </div>
            <div class="mb-3">
                <label for="last_name" class="form-label">Last Name:</label>
                <input type="text" class="form-control" id="last_name" name="last_name"
                    value="{{ session('user')->last_name }}" required />
            </div>
            <div class="mb-3">
                <label for="username" class="form-label">Username:</label>
                <input type="text" class="form-control" id="username" name="username"
                    value="{{ session('user')->username }}" required />
            </div>
            <button type="submit" class="btn btn-primary">Update Profile</button>
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
