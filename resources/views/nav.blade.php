<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Orbitron&display=swap');

        body {
            background-color: #1A1A1A;
            font-family: 'Orbitron', sans-serif;
            color: white;
            transition: background-color 0.3s ease;
        }

        /* Navbar Styles */
        .navbar {
            background-color: #FF6F00;
            box-shadow: 0 0 15px #FF6F00;
            height: 100vh;
            position: fixed;
            top: 0;
            left: 0;
            width: 250px;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            padding: 20px;
            transition: all 0.3s ease;
        }

        .navbar .container-fluid {
            flex-direction: column;
            align-items: flex-start;
            width: 100%;
        }

        .navbar-brand {
            font-size: 1.5rem;
            font-weight: bold;
            color: white;
            margin-bottom: 20px;
        }

        .navbar-nav {
            width: 100%;
            gap: 10px;
        }

        .nav-item {
            width: 100%;
        }

        .nav-link {
            color: white !important;
            transition: background-color 0.3s ease, color 0.3s ease, transform 0.3s ease;
            padding: 10px 15px;
            border-radius: 6px;
            margin: 5px 0;
            display: block;
            width: 100%;
        }

        .nav-link:hover {
            color: #FFB300 !important;
            background-color: #FF3D00;
            transform: translateY(-2px);
            box-shadow: 0 0 8px #FF3D00;
        }

        .nav-link::after {
            content: '';
            position: absolute;
            left: 0;
            bottom: 0;
            width: 0;
            height: 2px;
            background-color: #FFB300;
            transition: width 0.3s ease;
        }

        .nav-link:hover::after {
            width: 100%;
        }

        .logout-btn {
            background-color: #FF3D00;
            border-color: #FF3D00;
            color: white !important;
            margin-top: 20px;
            transition: transform 0.3s ease, box-shadow 0.3s ease, background-color 0.3s ease;
            box-shadow: 0 0 10px #FF3D00;
            border-radius: 6px;
        }

        .logout-btn:hover {
            background-color: #FFAB40;
            border-color: #FFAB40;
            transform: scale(1.1);
            box-shadow: 0 0 15px #FFAB40;
        }

        .navbar-toggler {
            border-color: rgba(255, 255, 255, 0.5);
        }

        .navbar-toggler-icon {
            background-image: url("data:image/svg+xml;charset=utf8,%3Csvg viewBox='0 0 30 30' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath stroke='rgba%28255,255,255,1%29' stroke-width='2' d='M4 7h22M4 15h22M4 23h22'/%3E%3C/svg%3E");
        }

        .main-content {
            margin-left: 250px;
            padding: 20px;
        }

        @media (max-width: 768px) {
            .navbar {
                position: relative;
                height: auto;
                width: 100%;
            }

            .navbar .container-fluid {
                flex-direction: column;
            }

            .main-content {
                margin-left: 0;
            }
        }
    </style>
</head>

<body>

    <nav class="navbar navbar-expand-lg">
        <div class="container-fluid">
            <a class="navbar-brand" href="{{ route('dashboard') }}">Dashboard</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarMenu"
                aria-controls="navbarMenu" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse w-100" id="navbarMenu">
                <ul class="navbar-nav flex-column w-100">
                    <li class="nav-item"><a class="nav-link" href="{{ route('upload.index') }}">Uploaded Files</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('profile.edit') }}">Edit Profile</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('password.edit') }}">Change Password</a></li>
                    @if(session('user') && session('user')->user_type === 'Admin')
                        <li class="nav-item"><a class="nav-link" href="{{ route('user.list') }}">Users</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ route('admin.reports') }}">Reports</a></li>
                    @endif
                </ul>
            </div>
            <div class="d-flex w-100">
                <a class="btn logout-btn w-100" href="{{ route('login') }}">Logout</a>
            </div>
        </div>
    </nav>

    <div class="main-content">
        <h1>Welcome to the Dashboard</h1>
        <p>Here is where you can manage your files, profile, and settings.</p>
    </div>

</body>

</html>
