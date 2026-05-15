<?php

namespace App\Http\Controllers;

use App\Models\Document;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DocumentController extends Controller
{
    public function index()
    {
        $documents = auth()->user()->documents()->latest()->paginate(20);
        return view('documents.index', compact('documents'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'file' => 'required|file|mimes:pdf,doc,docx|max:5120',
            'name' => 'required|string',
            'type' => 'required|string',
            'application_id' => 'nullable|exists:applications,id',
        ]);

        $path = $request->file('file')->store('documents', 's3');

        auth()->user()->documents()->create([
            'name' => $request->name,
            'type' => $request->type,
            'path' => $path,
            'application_id' => $request->application_id,
        ]);

        return back()->with('success', 'Document uploaded.');
    }

    public function destroy(Document $document)
    {
        $this->authorize('delete', $document);
        Storage::disk('s3')->delete($document->path);
        $document->delete();
        return back()->with('success', 'Document deleted.');
    }
}