<style>
    body {
        background-color: #F2EFE7;
    }
    .navbar { background-color: #48A6A7; }
    .navbar-brand, .nav-link { color: white !important; }
    .nav-link:hover { color: #D0EBF2 !important; }
    .logout-btn {
        background-color: #2973B2;
        border-color: #2973B2;
        color: white !important;
        margin-left: 10px;
    }
    .logout-btn:hover {
        background-color: #9ACBD0;
        border-color: #9ACBD0;
        color: white !important;
    }
    .navbar-toggler {
        border-color: rgba(255, 255, 255, 0.5);
    }
    .navbar-toggler-icon {
        background-image: url("data:image/svg+xml;charset=utf8,%3Csvg viewBox='0 0 30 30' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath stroke='rgba%28255,255,255,1%29' stroke-width='2' d='M4 7h22M4 15h22M4 23h22'/%3E%3C/svg%3E");
    }
</style>

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