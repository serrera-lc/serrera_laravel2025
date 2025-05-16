<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <title>My Uploaded Files</title>
    <link href="{{ asset('css/dashboard.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet" />
    <style>
        /* Futuristic neon orange theme */
        @import url('https://fonts.googleapis.com/css2?family=Orbitron&display=swap');

        body {
            background-color: #1e1e1e;
            /* Dark background */
            color: white;
            font-family: 'Orbitron', sans-serif;
            margin: 0;
            padding: 0;
        }

        .container {
            margin-top: 3rem;
        }

        /* Filter card design */
        .filter-card {
            background-color: rgba(30, 30, 30, 0.9);
            /* Slightly dark background */
            border: 1px solid #FF6F00;
            /* Neon orange border */
            border-radius: 12px;
            padding: 2rem;
            box-shadow: 0 0 25px rgba(255, 111, 0, 0.2);
            /* Neon glow effect */
            font-family: 'Orbitron', sans-serif;
        }

        /* Table styling */
        .table {
            background-color: rgba(30, 30, 30, 0.9);
            border-radius: 8px;
            color: white;
        }

        .table th,
        .table td {
            color: #fff;
            vertical-align: middle;
            padding: 1rem;
        }

        thead.custom-header {
            background-color: #FF6F00 !important;
            /* Neon orange header */
            color: white;
        }

        .table-striped tbody tr:nth-of-type(odd) {
            background-color: rgba(50, 50, 50, 0.7);
        }

        .table-hover tbody tr {
            background-color: rgba(0, 0, 0, 0.2);
            transition: background-color 0.3s ease, box-shadow 0.3s ease;
        }

        .table-hover tbody tr:hover {
            background-color: rgba(0, 0, 0, 0.3);
            box-shadow: 0 0 15px rgba(255, 111, 0, 0.5);
            cursor: pointer;
        }

        /* Button styles */
        .btn-primary {
            background-color: #FF6F00;
            border-color: #FF6F00;
            color: white;
            font-weight: bold;
            text-transform: uppercase;
            transition: 0.3s ease;
            box-shadow: 0 0 10px rgba(255, 111, 0, 0.5);
            border-radius: 6px;
        }

        .btn-primary:hover {
            background-color: #FF6F00;
            /* Keeping same color on hover */
            border-color: #FF6F00;
            box-shadow: 0 0 15px rgba(255, 111, 0, 0.8);
            transform: scale(1.05);
        }

        .btn-outline-secondary {
            border-color: #FF6F00;
            color: #FF6F00;
            font-weight: 600;
        }

        .btn-outline-secondary:hover {
            background-color: #FF6F00;
            color: white;
            transform: scale(1.05);
        }

        .btn-success,
        .btn-danger {
            border-radius: 6px;
        }

        /* Pagination */
        .pagination .page-link {
            background-color: #FF6F00;
            border-color: #FF6F00;
            color: white;
        }

        .pagination .page-link:hover {
            background-color: #FF6F00;
            border-color: #FF6F00;
            color: white;
        }

        /* Heading styling */
        h2 {
            color: #FF6F00;
            text-align: center;
            font-size: 2.5rem;
            letter-spacing: 1px;
            text-shadow: 0 0 15px #FF6F00, 0 0 25px #FF6F00;
            margin-bottom: 1rem;
        }

        /* Alerts */
        .alert-success {
            background-color:rgb(167, 97, 40);
            color: white;
            border-radius: 8px;
            padding: 1rem;
            font-weight: bold;
            text-align: center;
            box-shadow: 0 0 15pxrgb(206, 103, 19);
        }

        /* Toast container */
        .toast-container {
            position: fixed;
            top: 1rem;
            right: 1rem;
            z-index: 1080;
            max-width: 350px;
        }

        /* Toast styling - neon orange futuristic */
        .toast {
            border-radius: 1rem;
            box-shadow:
                0 0 8px #ff6f00aa,
                0 0 20px #ff6f00cc,
                0 0 30px #ff6f0055,
                inset 0 0 8px #ff6f00cc;
            font-size: 1rem;
            padding: 1rem 1.5rem;
            backdrop-filter: blur(8px);
            -webkit-backdrop-filter: blur(8px);
            background-color: rgba(40, 40, 40, 0.95);
            color: #ffb347;
            border-left: 6px solid #ff6f00;
            font-family: 'Orbitron', sans-serif;
            animation: neonPulse 3s ease-in-out infinite alternate;
        }

        .toast .toast-body {
            font-weight: 600;
            color: #ffb347;
            text-shadow:
                0 0 4px #ff6f00,
                0 0 10px #ff6f00cc;
        }

        @keyframes neonPulse {
            0%,
            100% {
                box-shadow:
                    0 0 8px #ff6f00aa,
                    0 0 20px #ff6f00cc,
                    0 0 30px #ff6f0055,
                    inset 0 0 8px #ff6f00cc;
                color: #ffb347;
                border-left-color: #ff6f00;
            }

            50% {
                box-shadow:
                    0 0 14px #ff6f00dd,
                    0 0 30px #ff6f00ee,
                    0 0 45px #ff6f0088,
                    inset 0 0 14px #ff6f00ee;
                color: #fff0b3;
                border-left-color: #ffa733;
            }
        }
    </style>
</head>

<body>
    @include('nav')

    <div class="container">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2>My Uploaded Files</h2>
            <a href="{{ route('upload.create') }}" class="btn btn-primary">Upload Files</a>
        </div>

        @if (session('success'))
            <div class="toast-container">
                <div id="feedbackToast" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
                    <div class="toast-body">
                        {{ session('success') }}
                    </div>
                </div>
            </div>
        @endif

        <div class="filter-card mb-4">
            <form method="GET" action="{{ route('upload.index') }}" class="row gy-2 gx-3 align-items-center">
                <div class="col-md-4">
                    <input type="text" name="filename" class="form-control" placeholder="Search by filename"
                        value="{{ request('filename') }}" />
                </div>
                <div class="col-md-4">
                    <select name="type" class="form-select">
                        <option value="">All File Types</option>
                        <option value="application/pdf" {{ request('type') == 'application/pdf' ? 'selected' : '' }}>PDF
                        </option>
                        <option value="image/png" {{ request('type') == 'image/png' ? 'selected' : '' }}>PNG</option>
                        <option value="image/jpeg" {{ request('type') == 'image/jpeg' ? 'selected' : '' }}>JPEG</option>
                        <option value="application/vnd.openxmlformats-officedocument.wordprocessingml.document"
                            {{ request('type') == 'application/vnd.openxmlformats-officedocument.wordprocessingml.document' ? 'selected' : '' }}>
                            DOCX
                        </option>
                        <option value="text/plain" {{ request('type') == 'text/plain' ? 'selected' : '' }}>TXT</option>
                    </select>
                </div>
                <div class="col-md-4">
                    <div class="d-flex flex-wrap justify-content-md-end justify-content-start gap-2">
                        <button type="submit" class="btn btn-primary">Filter</button>
                        <a href="{{ route('upload.index') }}" class="btn btn-outline-secondary">Clear</a>
                    </div>
                </div>
            </form>
        </div>

        <div class="table-responsive">
            <table class="table table-hover table-striped align-middle">
                <thead class="custom-header text-center">
                    <tr>
                        <th>Filename</th>
                        <th>Type</th>
                        <th>Uploaded</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($uploads as $upload)
                        <tr>
                            <td>{{ $upload->original_filename }}</td>
                            <td>{{ $upload->type }}</td>
                            <td>{{ $upload->created_at->format('Y-m-d H:i') }}</td>
                            <td>
                                <a href="{{ route('upload.download', $upload) }}" class="btn btn-sm btn-success me-1">Download</a>
                                <a href="{{ route('upload.edit', $upload) }}" class="btn btn-sm btn-primary me-1">Update</a>
                                <form action="{{ route('upload.destroy', $upload) }}" method="POST" class="d-inline"
                                    onsubmit="return confirm('Are you sure you want to delete this file?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="text-center text-muted">No files found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="d-flex justify-content-center mt-4">
            {{ $uploads->withQueryString()->links() }}
        </div>
    </div>

    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const toastEl = document.getElementById('feedbackToast');
            if (toastEl) {
                // Bootstrap 5 Toast initialization and show
                const bsToast = new bootstrap.Toast(toastEl, { delay: 3000 });
                bsToast.show();

                // Optionally reload page after toast hides
                toastEl.addEventListener('hidden.bs.toast', () => {
                    // Uncomment if you want to reload page after toast
                    // location.reload();
                });
            }
        });
    </script>
</body>

</html>
