<style>
    body {
        background-color: #0D0D0D;
        color: #F5F5F5;
        font-family: 'Orbitron', sans-serif;
    }

    .navbar {
        background-color: #1A1A1A;
        box-shadow: 0 0 15px #FF7300;
    }

    .navbar-brand, .nav-link {
        color: #FF7300 !important;
        text-shadow: 0 0 5px #FF7300;
    }

    .nav-link:hover {
        color: #FFFFFF !important;
        text-shadow: 0 0 10px #FFA94D;
    }

    .logout-btn {
        background-color: #FF7300;
        border-color: #FF7300;
        color: black !important;
        margin-left: 10px;
        font-weight: bold;
        box-shadow: 0 0 10px #FF7300;
    }

    .logout-btn:hover {
        background-color: #FFA94D;
        border-color: #FFA94D;
        color: black !important;
        box-shadow: 0 0 15px #FFA94D;
    }

    .navbar-toggler {
        border-color: #FF7300;
    }

    .navbar-toggler-icon {
        background-image: url("data:image/svg+xml;charset=utf8,%3Csvg viewBox='0 0 30 30' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath stroke='orange' stroke-width='2' d='M4 7h22M4 15h22M4 23h22'/%3E%3C/svg%3E");
    }
</style>

<!-- Include this Google Font for futuristic look -->
<link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@400;700&display=swap" rel="stylesheet">


<nav class="navbar navbar-expand-lg">
    <div class="container-fluid">
        <a class="navbar-brand" href="{{ route('dashboard') }}">Dashboard</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarMenu"
            aria-controls="navbarMenu" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarMenu">
            <ul class="navbar-nav me-auto">
                <li class="nav-item"><a class="nav-link" href="#">Uploaded Files</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('profile.edit') }}">Edit Profile</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('password.edit') }}">Change Password</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('user.list') }}">Users</a></li>
            </ul>
        </div>
        <div class="d-flex">
            <a class="btn logout-btn" href="{{ route('login') }}">Logout</a>
        </div>
    </div>
</nav>