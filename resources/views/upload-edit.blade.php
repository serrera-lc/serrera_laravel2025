<!-- Include the navigation bar from a Blade partial -->
@include('nav')

<!-- Main container for the update form -->
<div class="container mt-5">
    <!-- Header showing the filename being updated -->
    <h2 class="mb-4 text-center" style="color:#FF6F00;">
        Update File: {{ $upload->original_filename }}
    </h2>

    <!-- File update form -->
    <form action="{{ route('upload.update', $upload) }}" method="POST" enctype="multipart/form-data">
        @csrf <!-- CSRF token for security -->
        @method('PUT') <!-- Spoof HTTP PUT method -->

        <!-- File input field -->
        <div class="mb-3">
            <label for="file" class="form-label">Choose a new file</label>
            <input type="file" class="form-control @error('file') is-invalid @enderror" name="file" id="file" required>

            <!-- Error message if validation fails -->
            @error('file')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <!-- Submit and cancel buttons -->
        <button type="submit" class="btn btn-primary">Update File</button>
        <a href="{{ route('upload.index') }}" class="btn btn-outline-secondary ms-2">Cancel</a>
    </form>
</div>
