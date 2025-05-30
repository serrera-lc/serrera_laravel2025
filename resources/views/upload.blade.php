<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Meta tags for character encoding and responsive behavior -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>File Upload</title>

    <!-- Bootstrap CSS -->
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">

    <style>
        /* General page styling */
        body {
            background: #121212;
            color: #f4f4f4;
            font-family: 'Roboto', sans-serif;
            margin: 0;
            padding: 0;
        }

        /* Navbar styling */
        nav {
            background: #1e1e1e;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.3);
            padding: 15px 0;
        }

        /* Header styling */
        h2 {
            color: rgb(212, 120, 0);
            font-weight: 600;
            text-align: center;
            margin-bottom: 30px;
        }

        /* Container layout */
        .container {
            max-width: 700px;
            margin: 0 auto;
            padding-top: 50px;
        }

        /* File input field styling */
        .form-control {
            background-color: #2a2a2a;
            border: 1px solid #444;
            border-radius: 10px;
            color: #f4f4f4;
            padding: 12px;
            font-size: 1rem;
            transition: border-color 0.3s ease, background-color 0.3s ease;
        }

        /* Focus state of input field */
        .form-control:focus {
            background-color: #333;
            border-color: rgb(212, 102, 0);
            box-shadow: 0 0 5px rgba(212, 120, 0, 0.7);
        }

        /* Primary button styling */
        .btn-primary {
            background-color: rgb(212, 113, 0);
            border: none;
            color: white;
            padding: 12px 20px;
            font-size: 1rem;
            border-radius: 50px;
            width: 100%;
            margin-top: 20px;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        /* Button hover effect */
        .btn-primary:hover {
            background-color: rgb(127, 61, 0);
            transform: scale(1.05);
        }

        /* Alert box styling */
        .alert {
            margin-top: 20px;
            padding: 10px;
            border-radius: 8px;
            font-weight: bold;
        }

        /* Success alert color */
        .alert-success {
            background-color: #2d6a4f;
            color: white;
        }

        /* Validation error message */
        .invalid-feedback {
            color: #f44336;
            font-weight: bold;
        }

        /* Highlight input field with error */
        .is-invalid {
            border-color: #f44336;
            background-color: #3e3e3e;
        }
    </style>
</head>

<body>
    <!-- Include navigation bar (external Blade file) -->
    @include('nav')

    <!-- Main container for the file upload form -->
    <div class="container mt-5">
        <h2>Upload a File</h2>

        <!-- Success message display -->
        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <!-- File upload form -->
        <form action="{{ route('upload.store') }}" method="POST" enctype="multipart/form-data">
            @csrf <!-- CSRF token for security -->

            <div class="mb-3">
                <label for="file" class="form-label">Choose Files</label>
                <!-- File input (allows multiple file selection) -->
                <input id="file" type="file" name="file[]" class="form-control @error('file.*') is-invalid @enderror" multiple required>

                <!-- Error messages -->
                @error('file')
                    <div class="invalid-feedback d-block">{{ $message }}</div>
                @enderror
                @error('file.*')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <!-- Submit button -->
            <button type="submit" class="btn btn-primary">Upload</button>
        </form>
    </div>
</body>

</html>
