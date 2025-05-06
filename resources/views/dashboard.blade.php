<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/dashboard.css') }}" rel="stylesheet">

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
        }

        .navbar-brand {
            font-size: 1.5rem;
            font-weight: bold;
            color: white;
            margin-bottom: 20px;
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

        /* Navbar Toggler (for smaller screens) */
        .navbar-toggler {
            border-color: rgba(255, 255, 255, 0.5);
        }

        .navbar-toggler-icon {
            background-image: url("data:image/svg+xml;charset=utf8,%3Csvg viewBox='0 0 30 30' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath stroke='rgba%28255,255,255,1%29' stroke-width='2' d='M4 7h22M4 15h22M4 23h22'/%3E%3C/svg%3E");
        }

        /* Main Content Styling */
        .main-content {
            margin-left: 250px;
            padding: 20px;
        }

        .container h2 {
            margin-top: 20px;
            font-size: 2rem;
            color: #FF6F00;
        }

        .container {
            margin-left: 270px;
            padding-top: 30px;
        }

        /* Responsive Layout */
        @media (max-width: 768px) {
            .navbar {
                position: relative;
                height: auto;
                width: 100%;
            }

            .navbar .container-fluid {
                flex-direction: row;
            }

            .main-content {
                margin-left: 0;
            }

            .container {
                margin-left: 0;
                padding-top: 20px;
            }
        }
    </style>
</head>
<body>

    @include('nav')

    <div class="main-content">
        <div class="container">
            <h2>Welcome to Your Dashboard, {{ session('user')->first_name }}!</h2>
            <p>Your personalized dashboard allows you to manage your uploaded files, profile, and settings.</p>
        </div>
    </div>

    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>

</body>
</html>
