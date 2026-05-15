<?php

namespace App\Http\Controllers;

use App\Models\Application;
use Illuminate\Http\Request;

class ApplicationController extends Controller
{
    // Dashboard - counts by status
    public function dashboard()
    {
        $stats = auth()->user()->applications()
            ->selectRaw('status, count(*) as total')
            ->groupBy('status')
            ->pluck('total', 'status');

        $open = auth()->user()->applications()->where('is_open', true)->count();

        return view('dashboard', compact('stats', 'open'));
    }

    // List all applications with filter by company
    public function index(Request $request)
    {
        $applications = auth()->user()->applications()
            ->when($request->company, fn($q) => $q->where('company_name', $request->company))
            ->when($request->status, fn($q) => $q->where('status', $request->status))
            ->latest()
            ->paginate(20);

        return view('applications.index', compact('applications'));
    }

    public function create()
    {
        return view('applications.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'company_name' => 'required|string',
            'role' => 'required|string',
            'location' => 'nullable|string',
            'job_posting' => 'nullable|string',
            'status' => 'required|in:applied,in_review,interview,offer,rejected,ghosted',
            'date_applied' => 'required|date',
            'is_open' => 'boolean',
        ]);

        auth()->user()->applications()->create($validated);

        return redirect()->route('applications.index');
    }

    public function show(Application $application)
    {
        $this->authorize('view', $application);
        return view('applications.show', compact('application'));
    }

    public function edit(Application $application)
    {
        $this->authorize('update', $application);
        return view('applications.edit', compact('application'));
    }

    public function update(Request $request, Application $application)
    {
        $this->authorize('update', $application);

        $validated = $request->validate([
            'company_name' => 'required|string',
            'role' => 'required|string',
            'location' => 'nullable|string',
            'job_posting' => 'nullable|string',
            'status' => 'required|in:applied,in_review,interview,offer,rejected,ghosted',
            'date_applied' => 'required|date',
            'is_open' => 'boolean',
        ]);

        $application->update($validated);

        return redirect()->route('applications.show', $application);
    }

    public function destroy(Application $application)
    {
        $this->authorize('delete', $application);
        $application->delete();
        return redirect()->route('applications.index');
    }
}