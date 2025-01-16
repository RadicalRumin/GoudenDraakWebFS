<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ExportController extends Controller
{
    public function index()
    {
        $files = Storage::disk('public')->files('orders');
        $files = array_map(function ($file) {
            return basename($file);
        }, $files);
        return view('downloads.index', compact('files'));
    }

    public function download($file)
    {
        // Check if the file exists in the storage
        if (Storage::disk('public')->exists('orders/' . $file)) {
            return response()->download(storage_path('app/public/orders/' . $file));
        }

        // If the file doesn't exist, show a 404 error
        abort(404);
    }
}
