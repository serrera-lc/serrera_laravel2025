<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>User List</title>
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}" />
    <style>
        body {
            background: #0d0d0d;
            color: #f1f1f1;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        h2 {
            color: #ff9100;
            text-shadow: 0 0 10px #ff9100;
        }

        .card {
            background: #1a1a1a;
            border: 1px solid #ff9100;
            box-shadow: 0 0 15px #ff910066;
        }

        .form-control,
        .btn {
            border-radius: 8px;
        }

        .form-control {
            background-color: #111;
            color: #fff;
            border: 1px solid #ff9100;
        }

        .form-control:focus {
            box-shadow: 0 0 8px #ff9100;
            border-color: #ff9100;
        }

        .btn-primary {
            background-color: #ff9100;
            border-color: #ff9100;
            color: #000;
            font-weight: bold;
        }

        .btn-outline-secondary {
            color: #ccc;
            border-color: #666;
        }

        .btn-outline-secondary:hover {
            background-color: #444;
            color: #fff;
        }

        .btn-success {
            background-color: #00ffc3;
            border-color: #00ffc3;
            color: #000;
            font-weight: bold;
        }

        .btn-danger {
            background-color: #ff4d4d;
            border-color: #ff4d4d;
            font-weight: bold;
        }

        table {
            background-color: #1a1a1a;
            color: #fff;
            border: none;
            box-shadow: 0 0 10px #ff910033;
        }

        th {
            color: #ff9100;
            border-bottom: 2px solid #ff9100;
        }

        td {
            vertical-align: middle;
            border-color: #333;
        }

        .alert {
            max-width: 600px;
            margin: 0 auto;
            border-radius: 10px;
            font-weight: bold;
        }

        .pagination .page-link {
            background-color: #111;
            color: #ff9100;
            border: 1px solid #ff9100;
        }

        .pagination .page-item.active .page-link {
            background-color: #ff9100;
            color: #000;
            font-weight: bold;
        }

        .pagination .page-link:hover {
            background-color: #333;
            color: #fff;
        }
    </style>
</head>

<body>

    @include('nav')

    @if (session('success'))
        <div class="alert alert-success mt-2 text-center" id="alert-message">{{ session('success') }}</div>
    @endif

    @if ($errors->has('delete'))
        <div class="alert alert-danger mt-2 text-center" id="alert-message">{{ $errors->first('delete') }}</div>
    @endif

    <script>
        if (document.getElementById('alert-message')) {
            setTimeout(() => {
                window.location.reload();
            }, 3000);
        }
    </script>

    <div class="container mt-5">
        <h2 class="text-center mb-4">User List</h2>

        <div class="card mb-4">
            <div class="card-body">
                <form method="GET" action="{{ route('user.list') }}">
                    <div class="row g-3 align-items-end">
                        <div class="col-md-4">
                            <label for="searchName" class="form-label">Search by Name</label>
                            <input type="text" id="searchName" name="name" placeholder="e.g. Sean"
                                value="{{ request('name') }}" class="form-control" />
                        </div>
                        <div class="col-md-4">
                            <label for="searchEmail" class="form-label">Search by Email</label>
                            <input type="text" id="searchEmail" name="email" placeholder="e.g. seanrodel@example.com"
                                value="{{ request('email') }}" class="form-control" />
                        </div>
                        <div class="col-md-4 d-flex flex-wrap gap-2">
                            <button type="submit" class="btn btn-primary">Filter</button>
                            @if(request('name') || request('email'))
                                <a href="{{ route('user.list') }}" class="btn btn-outline-secondary">Clear Filters</a>
                            @endif
                            <a href="{{ route('user.export', request()->query()) }}" class="btn btn-success">Download CSV</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <div class="table-responsive rounded p-3">
            <table class="table table-hover align-middle mb-0 text-center">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Username</th>
                        <th>Role</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($users as $user)
                        <tr>
                            <td>{{ $user->first_name }} {{ $user->last_name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->username }}</td>
                            <td>{{ ucfirst($user->user_type) }}</td>
                            <td>
                                <form action="{{ route('user.destroy', $user->id) }}" method="POST" class="d-inline"
                                    onsubmit="return confirm('Are you sure you want to delete this user?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-md">
                                        <i class="bi bi-trash"></i> Delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="d-flex justify-content-center mt-4">
            {{ $users->onEachSide(1)->links('pagination::bootstrap-5') }}
        </div>
    </div>

</body>

</html>
