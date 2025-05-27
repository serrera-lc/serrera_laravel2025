<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Basic Meta Tags -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">

    <!-- Custom CSS for Registration -->
    <link rel="stylesheet" href="css/registration.css">

    <!-- Inline Style for Password Strength -->
    <style>
        #password-strength {
            font-size: 0.9rem;
        }

        .strength-weak {
            color: #dc3545; /* Red */
        }

        .strength-medium {
            color: #ffc107; /* Yellow */
        }

        .strength-strong {
            color: #28a745; /* Green */
        }
    </style>
</head>

<body>
    <!-- Navigation Bar -->
    <nav class="nav bar navbar-expanded-lg">
        <div class="container">
            <a class="navbar-brand" href="#"></a>
        </div>
    </nav>

    <!-- Registration Form Section -->
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <!-- Card Container for Registration Form -->
                <div class="card p-4 shadow-sm">
                    <h2 class="mb-3">Register</h2>

                    <!-- Registration Form -->
                    <form method="POST" action="{{ route('register.save') }}">
                        @csrf <!-- CSRF token for security -->

                        <!-- First Name Field -->
                        <div class="mb-3">
                            <label for="firstname" class="form-label">First Name</label>
                            <input type="text" class="form-control @error('firstname') is-invalid @enderror"
                                id="firstname" name="firstname" value="{{ old('firstname') }}">
                            @error('firstname')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Last Name Field -->
                        <div class="mb-3">
                            <label for="lastname" class="form-label">Last Name</label>
                            <input type="text" class="form-control @error('lastname') is-invalid @enderror"
                                id="lastname" name="lastname" value="{{ old('lastname') }}">
                            @error('lastname')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Date of Birth Field -->
                        <div class="mb-3">
                            <label for="bod" class="form-label">Date of Birth</label>
                            <input type="date" class="form-control @error('bod') is-invalid @enderror" id="bod"
                                name="bod" value="{{ old('bod') }}">
                            @error('bod')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Sex Dropdown -->
                        <div class="mb-3">
                            <label for="sex" class="form-label">Sex</label>
                            <select class="form-control @error('sex') is-invalid @enderror" id="sex" name="sex">
                                <option value="" disabled {{ old('sex') ? '' : 'selected' }}>Select</option>
                                <option value="Male" {{ old('sex') == 'Male' ? 'selected' : '' }}>Male</option>
                                <option value="Female" {{ old('sex') == 'Female' ? 'selected' : '' }}>Female</option>
                            </select>
                            @error('sex')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Email Field -->
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control @error('email') is-invalid @enderror" id="email"
                                name="email" value="{{ old('email') }}">
                            @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Username Field -->
                        <div class="mb-3">
                            <label for="username" class="form-label">Username</label>
                            <input type="text" class="form-control @error('username') is-invalid @enderror"
                                id="username" name="username" value="{{ old('username') }}">
                            @error('username')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Password Field -->
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control @error('password') is-invalid @enderror"
                                id="password" name="password">
                            @error('password')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Confirm Password Field -->
                        <div class="mb-3">
                            <label for="password_confirmation" class="form-label">Confirm Password</label>
                            <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror"
                                id="password_confirmation" name="password_confirmation">
                            @error('password_confirmation')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Terms and Conditions Checkbox -->
                        <div class="mb-3 form-check">
                            <input type="checkbox" class="form-check-input @error('terms') is-invalid @enderror"
                                id="terms" name="terms" {{ old('terms') ? 'checked' : '' }}>
                            <label class="form-check-label" for="terms">
                                I agree with the Privacy Policy and Terms and Conditions
                            </label>
                            @error('terms')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Submit Button -->
                        <button type="submit" class="btn btn-primary w-100">Register</button>

                        <!-- Go Back Button -->
                        <br><br>
                        <a href="{{ route('login') }}" class="btn btn-secondary w-100">Go Back</a>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Password Strength Checker Script -->
    <script src="{{ asset('js/password-strength.js') }}"></script>
</body>

</html>
