@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Uploaded Files</h2>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        @if(session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif

        <form action="{{ route('uploads.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="file">Choose file to upload:</label>
                <input type="file" name="file" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary mt-3">Upload</button>
        </form>

        <hr>

        <h3>File List</h3>
        <table class="table">
            <thead>
                <tr>
                    <th>File Name</th>
                    <th>Type</th>
                    <th>Uploaded By</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($uploads as $upload)
                    <tr>
                        <td>{{ $upload->original_filename }}</td>
                        <td>{{ $upload->type }}</td>
                        <td>
                            {{ $upload->user?->first_name }} {{ $upload->user?->last_name }}
                        </td>
                        <td>
                            <a href="{{ route('uploads.download', $upload->id) }}" class="btn btn-success">Download</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
