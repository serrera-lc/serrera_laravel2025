<<<<<<< HEAD
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/dashboard.css') }}" rel="stylesheet">

    <style>

    </style>
</head>
<body>

    @include('nav')

    <div class="container">
        <h2>Welcome to Your Dashboard,  {{ session('user')->first_name }}!</h2>
        <p>Here is where you can manage your account and settings.</p>
    </div>


</body>
</html>

<script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>

=======
<h2>Welcome to Your Dashboard,
    {{ session('user')?->first_name ?? 'Guest' }}
</h2>
>>>>>>> 3565232c3feebc5dea729802e15a161d096a2c8c
