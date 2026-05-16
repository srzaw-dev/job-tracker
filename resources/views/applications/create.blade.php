<!DOCTYPE html>
<html class="light" lang="en">
<head>
@include('partials.trackr-head', ['title' => 'Add Application'])
<style>
    .form-input-focus:focus { outline: none; border-width: 2px; border-color: #a33900; }
    .custom-scrollbar::-webkit-scrollbar { width: 6px; }
    .custom-scrollbar::-webkit-scrollbar-track { background: transparent; }
    .custom-scrollbar::-webkit-scrollbar-thumb { background: #e2bfb2; border-radius: 10px; }
</style>
</head>
<body class="bg-background text-on-surface selection:bg-primary-fixed selection:text-on-primary-fixed">
@include('partials.nav-sidebar', ['active' => 'applications'])

<header class="sticky top-0 z-40 w-full flex items-center justify-between px-margin-desktop py-sm ml-[240px] bg-surface/80 backdrop-blur-md border-b border-outline-variant">
    <div class="flex items-center gap-lg flex-1">
        <div class="relative w-full max-w-md focus-within:ring-2 focus-within:ring-primary rounded-lg">
            <span class="material-symbols-outlined absolute left-sm top-1/2 -translate-y-1/2 text-secondary">search</span>
            <input class="w-full pl-xl pr-md py-xs bg-surface-container-low border-none rounded-lg font-body-sm text-body-sm focus:ring-0" placeholder="Search applications..." type="text" />
        </div>
    </div>
    <div class="flex items-center gap-lg">
        <button class="text-secondary hover:text-primary transition-all relative">
            <span class="material-symbols-outlined">notifications</span>
        </button>
    </div>
</header>

<main class="ml-[240px] p-margin-desktop min-h-[calc(100vh-64px)]">
    <div class="max-w-5xl mx-auto">
        <div class="flex items-center gap-md mb-xl">
            <a href="{{ route('applications.index') }}" class="p-sm hover:bg-surface-container rounded-full transition-colors">
                <span class="material-symbols-outlined text-secondary">arrow_back</span>
            </a>
            <div>
                <h2 class="font-headline-md text-headline-md text-on-surface">Add Application</h2>
                <p class="font-body-sm text-body-sm text-secondary">Track your career journey by adding a new job pursuit.</p>
            </div>
        </div>

        <form method="POST" action="{{ route('applications.store') }}">
            @csrf
            <div class="grid grid-cols-12 gap-gutter">
                <div class="col-span-12 lg:col-span-8 space-y-gutter">
                    <section class="bg-surface-container-lowest border border-outline-variant p-lg rounded-xl shadow-sm">
                        <div class="flex items-center gap-sm mb-lg border-b border-outline-variant pb-sm">
                            <span class="material-symbols-outlined text-primary">business_center</span>
                            <h3 class="font-label-md text-label-md uppercase tracking-wider text-on-surface-variant">Basic Info</h3>
                        </div>
                        <div class="grid grid-cols-2 gap-lg">
                            <div class="col-span-2 md:col-span-1">
                                <label class="block font-label-sm text-label-sm text-secondary mb-xs" for="company_name">Company Name</label>
                                <input class="w-full bg-surface border border-outline-variant rounded-lg px-md py-sm font-body-md text-body-md form-input-focus @error('company_name') border-error @enderror"
                                    id="company_name" name="company_name" type="text" placeholder="e.g. Acme Corp"
                                    value="{{ old('company_name') }}" />
                                @error('company_name')
                                    <p class="font-label-sm text-label-sm text-error mt-xs">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="col-span-2 md:col-span-1">
                                <label class="block font-label-sm text-label-sm text-secondary mb-xs" for="role">Job Title</label>
                                <input class="w-full bg-surface border border-outline-variant rounded-lg px-md py-sm font-body-md text-body-md form-input-focus @error('role') border-error @enderror"
                                    id="role" name="role" type="text" placeholder="e.g. Senior UX Designer"
                                    value="{{ old('role') }}" />
                                @error('role')
                                    <p class="font-label-sm text-label-sm text-error mt-xs">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="col-span-2">
                                <label class="block font-label-sm text-label-sm text-secondary mb-xs" for="job_posting">Job URL</label>
                                <div class="relative">
                                    <span class="material-symbols-outlined absolute left-sm top-1/2 -translate-y-1/2 text-secondary-fixed-dim">link</span>
                                    <input class="w-full pl-xl bg-surface border border-outline-variant rounded-lg px-md py-sm font-body-md text-body-md form-input-focus"
                                        id="job_posting" name="job_posting" type="url" placeholder="https://linkedin.com/jobs/..."
                                        value="{{ old('job_posting') }}" />
                                </div>
                            </div>
                            <div class="col-span-2 md:col-span-1">
                                <label class="block font-label-sm text-label-sm text-secondary mb-xs" for="location">Location</label>
                                <input class="w-full bg-surface border border-outline-variant rounded-lg px-md py-sm font-body-md text-body-md form-input-focus"
                                    id="location" name="location" type="text" placeholder="e.g. New York, NY"
                                    value="{{ old('location') }}" />
                            </div>
                            <div class="col-span-2 md:col-span-1">
                                <label class="block font-label-sm text-label-sm text-secondary mb-xs">Open Position</label>
                                <div class="flex items-center gap-md mt-sm">
                                    <label class="flex items-center gap-sm cursor-pointer">
                                        <input type="radio" name="is_open" value="1" {{ old('is_open', '1') == '1' ? 'checked' : '' }} class="text-primary focus:ring-primary" />
                                        <span class="font-body-sm text-body-sm">Open</span>
                                    </label>
                                    <label class="flex items-center gap-sm cursor-pointer">
                                        <input type="radio" name="is_open" value="0" {{ old('is_open') == '0' ? 'checked' : '' }} class="text-primary focus:ring-primary" />
                                        <span class="font-body-sm text-body-sm">Closed</span>
                                    </label>
                                </div>
                            </div>
                        </div>
                    </section>

                    <section class="bg-surface-container-lowest border border-outline-variant p-lg rounded-xl shadow-sm">
                        <div class="flex items-center gap-sm mb-lg border-b border-outline-variant pb-sm">
                            <span class="material-symbols-outlined text-primary">notes</span>
                            <h3 class="font-label-md text-label-md uppercase tracking-wider text-on-surface-variant">Notes</h3>
                        </div>
                        <textarea class="w-full bg-surface border border-outline-variant rounded-lg px-md py-sm font-body-md text-body-md form-input-focus custom-scrollbar"
                            name="notes" rows="4" placeholder="Personal thoughts, networking contacts, or specific requirements...">{{ old('notes') }}</textarea>
                    </section>
                </div>

                <div class="col-span-12 lg:col-span-4 space-y-gutter">
                    <section class="bg-surface-container-lowest border border-outline-variant p-lg rounded-xl shadow-sm">
                        <div class="flex items-center gap-sm mb-lg border-b border-outline-variant pb-sm">
                            <span class="material-symbols-outlined text-primary">info</span>
                            <h3 class="font-label-md text-label-md uppercase tracking-wider text-on-surface-variant">Application Info</h3>
                        </div>
                        <div class="space-y-md">
                            <div>
                                <label class="block font-label-sm text-label-sm text-secondary mb-xs" for="date_applied">Applied Date</label>
                                <input class="w-full bg-surface border border-outline-variant rounded-lg px-md py-sm font-body-md text-body-md form-input-focus"
                                    id="date_applied" name="date_applied" type="date"
                                    value="{{ old('date_applied', date('Y-m-d')) }}" />
                            </div>
                            <div>
                                <label class="block font-label-sm text-label-sm text-secondary mb-xs" for="status">Status</label>
                                <select class="w-full bg-surface border border-outline-variant rounded-lg px-md py-sm font-body-md text-body-md form-input-focus"
                                    id="status" name="status">
                                    <option value="applied" {{ old('status', 'applied') === 'applied' ? 'selected' : '' }}>Applied</option>
                                    <option value="in_review" {{ old('status') === 'in_review' ? 'selected' : '' }}>In Review</option>
                                    <option value="interview" {{ old('status') === 'interview' ? 'selected' : '' }}>Interview</option>
                                    <option value="offer" {{ old('status') === 'offer' ? 'selected' : '' }}>Offer</option>
                                    <option value="rejected" {{ old('status') === 'rejected' ? 'selected' : '' }}>Rejected</option>
                                    <option value="ghosted" {{ old('status') === 'ghosted' ? 'selected' : '' }}>Ghosted</option>
                                </select>
                            </div>
                        </div>
                    </section>
                </div>
            </div>

            <footer class="mt-xl flex items-center justify-end gap-lg pt-lg border-t border-outline-variant mb-margin-desktop">
                <a href="{{ route('applications.index') }}" class="px-xl py-md font-label-md text-label-md text-secondary hover:bg-surface-container rounded-xl transition-colors">
                    Cancel
                </a>
                <button type="submit" class="px-xl py-md font-label-md text-label-md bg-primary text-on-primary rounded-xl shadow-lg hover:shadow-xl hover:opacity-90 transition-all active:scale-95">
                    Save Application
                </button>
            </footer>
        </form>
    </div>
</main>
</body>
</html>
