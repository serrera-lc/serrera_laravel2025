<!DOCTYPE html>
<<<<<<< HEAD
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/registration.css">
</head>


<body>
    <nav class="nav bar navbar-expanded-lg">
        <div class="container">
            <a class="navbar-brand" href="#">

            </a>
        </div>

    </nav>


    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card p-4 shadow-sm">
                    <h2 class="mb-3">Register</h2>
                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        <div class="mb-3">
                            <label for="firstname" class="form-label">First Name</label>
                            <input type="text" class="form-control" id="firstname" name="firstname" required>
                        </div>
                        <div class="mb-3">
                            <label for="middlename" class="form-label">Middle Name</label>
                            <input type="text" class="form-control" id="middlename" name="middlename">
                        </div>
                        <div class="mb-3">
                            <label for="lastname" class="form-label">Last Name</label>
                            <input type="text" class="form-control" id="lastname" name="lastname" required>
                        </div>
                        <div class="mb-3">
                            <label for="bod" class="form-label">Date of Birth</label>
                            <input type="date" class="form-control" id="bod" name="bod" required>
                        </div>
                        <div class="mb-3">
                            <label for="sex" class="form-label">Sex</label>
                            <select class="form-control" id="sex" name="sex" required>
                                <option value="" selected disabled>Select</option>
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" name="email" required>
                        </div>
                        <div class="mb-3">
                            <label for="username" class="form-label">Username</label>
                            <input type="text" class="form-control" id="username" name="username" required>
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control" id="password" name="password" required>
                        </div>
                        <div class="mb-3 form-check">
                            <input type="checkbox" class="form-check-input" id="terms" name="terms" required>
                            <label class="form-check-label" for="terms">I agree with the Privacy Policy and Terms and
                                Conditions</label>
                        </div>
                        <button type="submit" class="btn btn-primary w-100">Register</button>
                        <br><br>
                        <a href="{{ route('login') }}" class="btn btn-secondary w-100">Go Back</a>
                    </form>

                </div>

            </div>

        </div>
    </div>
</body>

=======
<html>
<head>
    <title>Register</title>
</head>
<body>
    <form action="{{ route('register.post') }}" method="POST">
        @csrf
        <label for="first_name">First Name:</label>
        <input type="text" name="first_name" required>

        <label for="last_name">Last Name:</label>
        <input type="text" name="last_name" required>

        <label for="sex">Sex:</label>
        <select name="sex" required>
            <option value="Male">Male</option>
            <option value="Female">Female</option>
        </select>

        <label for="birthday">Birthday:</label>
        <input type="date" name="birthday" required>

        <label for="username">Username:</label>
        <input type="text" name="username" required>

        <label for="email">Email:</label>
        <input type="email" name="email" required>

        <label>
            <input type="checkbox" name="terms" required>
            I agree with the Privacy Policy and Terms and Conditions.
        </label>

        <button type="submit">Register</button>
    </form>
</body>
>>>>>>> 3565232c3feebc5dea729802e15a161d096a2c8c
</html>