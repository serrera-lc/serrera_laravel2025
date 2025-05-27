<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Meta tags for character encoding and responsive design -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Page Title -->
    <title>Users</title>

    <!-- Bootstrap CSS for styling -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Inline Styles and Google Fonts -->
    <style>
    /* Import Orbitron font from Google Fonts */
    @import url('https://fonts.googleapis.com/css2?family=Orbitron&display=swap');

    /* Set global body styles */
    body {
        background-color: #0f0f0f;
        font-family: 'Orbitron', sans-serif;
        color: white;
    }

    /* Navbar styles */
    .navbar {
        background-color: #FF6F00; /* Neon orange */
        box-shadow: 0 2px 8px rgba(255, 111, 0, 0.3);
    }

    /* Navbar brand and link styles */
    .navbar-brand,
    .nav-link {
        color: white !important;
        font-weight: bold;
        transition: 0.3s ease;
    }

    /* Hover effect for nav links */
    .nav-link:hover {
        color: #FFB300 !important; /* Lighter neon orange */
        text-shadow: 0 0 5px #FF6F00;
    }

    /* Logout button styling */
    .logout-btn {
        background-color: #FF3D00; /* Bright orange */
        border-color: #FF3D00;
        color: white !important;
        transition: all 0.3s ease;
        font-weight: bold;
        border-radius: 6px;
    }

    /* Hover effect for logout button */
    .logout-btn:hover {
        background-color: #FFAB40;
        border-color: #FFAB40;
        transform: scale(1.05);
        box-shadow: 0 0 10px #FF6F00;
    }

    /* Top margin for main container */
    .container {
        margin-top: 20px;
    }
    </style>

</head>
<body>
    <!-- Laravel include for the navigation bar -->
    @include('nav')
    
    <!-- Main content container -->
    <div class="container mt-4">
        <h2>User Management</h2>

        <!-- Table to display user information -->
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>        <!-- User ID -->
                    <th>Name</th>      <!-- User name -->
                    <th>Email</th>     <!-- User email -->
                    <th>Role</th>      <!-- User role (e.g., admin, user) -->
                </tr>
            </thead>
            <tbody>
                <!-- User rows will be dynamically injected here (e.g., using Blade or JavaScript) -->
            </tbody>
        </table>
    </div>
</body>
</html>
