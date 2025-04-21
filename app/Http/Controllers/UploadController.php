<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Upload;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class UploadController extends Controller
{
    // Method to handle file upload
    public function store(Request $request)
    {
        $request->validate([
            'file' => 'required|file|max:5120', // Max 5MB
        ]);

        $file = $request->file('file');

        $originalName = $file->getClientOriginalName();
        $type = $file->getClientMimeType();
        $filename = Str::random(40) . '.' . $file->getClientOriginalExtension();

        // Save file to storage/app/uploads
        $file->storeAs('uploads', $filename);

        // Save the file record in the database
        $upload = Upload::create([
            'original_filename' => $originalName,
            'filename' => $filename,
            'type' => $type,
            'uploaded_by' => Auth::id(),
        ]);

        return redirect()->route('uploads.index')->with('success', 'File uploaded successfully!');
    }

    // Method to list all uploaded files
    public function index()
    {
        $uploads = Upload::all(); // Get all uploads
        return view('uploads.index', compact('uploads'));
    }

    // Method to download file
    public function download($id)
    {
        $upload = Upload::findOrFail($id); // Find file by ID

        // Check if file exists in storage
        if (Storage::exists('uploads/' . $upload->filename)) {
            return Storage::download('uploads/' . $upload->filename, $upload->original_filename);
        }

        return redirect()->route('uploads.index')->with('error', 'File not found.');
    }
}
