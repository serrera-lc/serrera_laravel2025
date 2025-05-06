<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Users</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <style>
    @import url('https://fonts.googleapis.com/css2?family=Orbitron&display=swap');

    body {
        background-color: #0f0f0f;
        font-family: 'Orbitron', sans-serif;
        color: white;
    }

    .navbar {
        background-color: #FF6F00; /* Neon orange */
        box-shadow: 0 2px 8px rgba(255, 111, 0, 0.3);
    }

    .navbar-brand,
    .nav-link {
        color: white !important;
        font-weight: bold;
        transition: 0.3s ease;
    }

    .nav-link:hover {
        color: #FFB300 !important; /* Lighter neon orange on hover */
        text-shadow: 0 0 5px #FF6F00;
    }

    .logout-btn {
        background-color: #FF3D00; /* Neon orange */
        border-color: #FF3D00;
        color: white !important;
        transition: all 0.3s ease;
        font-weight: bold;
        border-radius: 6px;
    }

    .logout-btn:hover {
        background-color: #FFAB40;
        border-color: #FFAB40;
        transform: scale(1.05);
        box-shadow: 0 0 10px #FF6F00;
    }

    .container {
        margin-top: 20px;
    }
</style>

</head>
<body>
    @include('nav')
    
    <div class="container mt-4">
        <h2>User Management</h2>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Role</th>
                </tr>
            </thead>
            <tbody>

            </tbody>
        </table>
    </div>
</body>
</html>