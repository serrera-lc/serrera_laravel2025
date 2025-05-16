 @include('nav')

<div class="container mt-5">
    <h2 class="mb-4 text-center" style="color:#FF6F00;">Update File: {{ $upload->original_filename }}</h2>

    <form action="{{ route('upload.update', $upload) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="file" class="form-label">Choose a new file</label>
            <input type="file" class="form-control @error('file') is-invalid @enderror" name="file" id="file" required>
            @error('file')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Update File</button>
        <a href="{{ route('upload.index') }}" class="btn btn-outline-secondary ms-2">Cancel</a>
    </form>
</div>

