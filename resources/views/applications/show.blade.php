<!DOCTYPE html>
<html lang="en">
<head>
@include('partials.trackr-head', ['title' => $application->role . ' at ' . $application->company_name])
<style>
    .material-symbols-outlined { font-variation-settings: 'FILL' 0, 'wght' 400, 'GRAD' 0, 'opsz' 24; display: inline-block; line-height: 1; text-transform: none; letter-spacing: normal; word-wrap: normal; white-space: nowrap; direction: ltr; }
    body { background-color: #f8f9ff; color: #0b1c30; }
</style>
</head>
<body class="font-body-md text-body-md">
@include('partials.nav-sidebar', ['active' => 'applications'])

<header class="sticky top-0 w-full z-40 h-16 bg-surface border-b border-outline-variant shadow-sm ml-[240px] w-[calc(100%-240px)]">
    <div class="flex justify-between items-center px-lg h-full">
        <div class="flex items-center gap-gutter flex-grow max-w-xl">
            <div class="relative w-full group">
                <span class="material-symbols-outlined absolute left-3 top-1/2 -translate-y-1/2 text-secondary">search</span>
                <input class="w-full bg-surface-container-low border border-outline-variant rounded-full py-2 pl-10 pr-4 focus:outline-none focus:ring-2 focus:ring-primary transition-all font-body-sm text-body-sm" placeholder="Search applications..." type="text" />
            </div>
        </div>
        <div class="flex items-center gap-md">
            <button class="hover:bg-surface-container rounded-full p-2 transition-colors">
                <span class="material-symbols-outlined text-secondary">notifications</span>
            </button>
        </div>
    </div>
</header>

<main class="ml-[240px] p-margin-desktop">
    <div class="max-w-[1200px] mx-auto">
        <div class="flex items-center gap-2 mb-lg text-secondary">
            <a href="{{ route('applications.index') }}" class="font-label-sm text-label-sm hover:text-primary transition-colors">Applications</a>
            <span class="material-symbols-outlined text-[16px]">chevron_right</span>
            <span class="font-label-md text-label-md text-primary">{{ $application->role }} at {{ $application->company_name }}</span>
        </div>

        {{-- Application Header --}}
        <div class="bg-surface-container-lowest rounded-xl p-lg border border-outline-variant shadow-sm mb-lg">
            <div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-lg">
                <div class="flex items-center gap-lg">
                    <div class="w-16 h-16 rounded-xl bg-white border border-outline-variant flex items-center justify-center p-2 shadow-sm">
                        <span class="material-symbols-outlined text-primary text-[32px]">business</span>
                    </div>
                    <div>
                        <div class="flex items-center gap-3 mb-1">
                            <h2 class="font-headline-lg text-headline-lg text-on-surface">{{ $application->role }}</h2>
                            @php
                                $statusBadge = match($application->status) {
                                    'applied'   => ['class' => 'bg-secondary-container text-on-secondary-container border-secondary/20', 'label' => 'Applied'],
                                    'in_review' => ['class' => 'bg-surface-container-highest text-secondary border-outline-variant', 'label' => 'In Review'],
                                    'interview' => ['class' => 'bg-tertiary-fixed text-on-tertiary-fixed border-tertiary/20', 'label' => 'Interview Phase'],
                                    'offer'     => ['class' => 'bg-green-100 text-green-800 border-green-200', 'label' => 'Offer Received'],
                                    'rejected'  => ['class' => 'bg-error-container text-on-error-container border-error/20', 'label' => 'Rejected'],
                                    'ghosted'   => ['class' => 'bg-surface-container text-secondary border-outline-variant', 'label' => 'Ghosted'],
                                    default     => ['class' => 'bg-surface-container text-secondary border-outline-variant', 'label' => ucfirst($application->status)],
                                };
                            @endphp
                            <span class="{{ $statusBadge['class'] }} px-3 py-1 rounded-full font-label-sm text-label-sm border">{{ $statusBadge['label'] }}</span>
                        </div>
                        <p class="font-body-lg text-body-lg text-secondary">
                            {{ $application->company_name }}
                            @if($application->location) • {{ $application->location }} @endif
                        </p>
                    </div>
                </div>
                <div class="flex gap-md">
                    <a href="{{ route('applications.edit', $application) }}" class="flex items-center gap-2 px-lg py-md border border-outline rounded-lg font-label-md text-label-md text-on-surface hover:bg-surface-container transition-all">
                        <span class="material-symbols-outlined">edit</span>
                        Edit
                    </a>
                    <form method="POST" action="{{ route('applications.destroy', $application) }}" onsubmit="return confirm('Delete this application?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="flex items-center gap-2 px-lg py-md bg-error text-on-error rounded-lg font-label-md text-label-md hover:opacity-90 transition-all shadow-sm">
                            <span class="material-symbols-outlined">delete</span>
                            Delete
                        </button>
                    </form>
                </div>
            </div>
        </div>

        {{-- Dashboard Grid --}}
        <div class="grid grid-cols-12 gap-gutter">
            <div class="col-span-12 lg:col-span-8 flex flex-col gap-gutter">
                {{-- Quick Info Cards --}}
                <div class="grid grid-cols-3 gap-md">
                    <div class="bg-surface-container-low p-md rounded-xl border border-outline-variant">
                        <p class="font-label-sm text-label-sm text-secondary mb-1 uppercase tracking-wider">Date Applied</p>
                        <p class="font-headline-sm text-headline-sm text-on-surface">
                            {{ $application->date_applied ? $application->date_applied->format('M d, Y') : '—' }}
                        </p>
                    </div>
                    <div class="bg-surface-container-low p-md rounded-xl border border-outline-variant">
                        <p class="font-label-sm text-label-sm text-secondary mb-1 uppercase tracking-wider">Status</p>
                        <p class="font-headline-sm text-headline-sm text-on-surface">{{ $statusBadge['label'] }}</p>
                    </div>
                    <div class="bg-surface-container-low p-md rounded-xl border border-outline-variant">
                        <p class="font-label-sm text-label-sm text-secondary mb-1 uppercase tracking-wider">Location</p>
                        <div class="flex items-center gap-2">
                            <span class="material-symbols-outlined text-primary text-[18px]">location_on</span>
                            <p class="font-headline-sm text-headline-sm text-on-surface">{{ $application->location ?: '—' }}</p>
                        </div>
                    </div>
                </div>

                {{-- Documents Sent --}}
                <div class="bg-surface-container-lowest p-lg rounded-xl border border-outline-variant shadow-sm">
                    <h3 class="font-headline-sm text-headline-sm mb-md flex items-center gap-2">
                        <span class="material-symbols-outlined text-primary">folder_zip</span>
                        Documents Sent
                    </h3>
                    <div class="space-y-sm">
                        @forelse($application->documents as $doc)
                            <div class="flex items-center justify-between p-sm rounded-lg hover:bg-surface-container transition-colors group border border-transparent hover:border-outline-variant">
                                <div class="flex items-center gap-3">
                                    <span class="material-symbols-outlined text-secondary">description</span>
                                    <span class="font-label-md text-label-md">{{ $doc->name }}</span>
                                    @if($doc->type)
                                        <span class="font-label-sm text-label-sm text-secondary">({{ $doc->type }})</span>
                                    @endif
                                </div>
                            </div>
                        @empty
                            <p class="font-body-sm text-body-sm text-secondary">No documents attached to this application.</p>
                        @endforelse
                    </div>
                </div>

                {{-- Notes --}}
                @if($application->notes)
                <div class="bg-surface-container-lowest p-lg rounded-xl border border-outline-variant shadow-sm">
                    <h3 class="font-headline-sm text-headline-sm mb-md flex items-center gap-2">
                        <span class="material-symbols-outlined text-primary">notes</span>
                        Notes
                    </h3>
                    <div class="space-y-md">
                        @foreach((array) $application->notes as $note)
                            <div class="p-md bg-surface-container-low rounded-lg border border-outline-variant">
                                <p class="text-body-sm text-on-surface">{{ $note }}</p>
                            </div>
                        @endforeach
                    </div>
                </div>
                @endif
            </div>

            {{-- Sidebar --}}
            <div class="col-span-12 lg:col-span-4 flex flex-col gap-gutter">
                @if($application->job_posting)
                <div class="bg-surface-container-lowest p-lg rounded-xl border border-outline-variant shadow-sm">
                    <h3 class="font-headline-sm text-headline-sm mb-md">Job Posting</h3>
                    <a href="{{ $application->job_posting }}" target="_blank" rel="noopener"
                        class="flex items-center gap-2 text-primary font-label-md text-label-md hover:underline">
                        <span class="material-symbols-outlined">open_in_new</span>
                        View Job Posting
                    </a>
                </div>
                @endif

                <div class="bg-surface-container-lowest p-lg rounded-xl border border-outline-variant shadow-sm">
                    <h3 class="font-headline-sm text-headline-sm mb-md">Quick Actions</h3>
                    <div class="space-y-sm">
                        <a href="{{ route('applications.edit', $application) }}"
                            class="flex items-center gap-3 p-sm rounded-lg hover:bg-surface-container transition-colors font-label-md text-label-md text-on-surface">
                            <span class="material-symbols-outlined text-primary">edit</span>
                            Edit Application
                        </a>
                        <a href="{{ route('documents.index') }}"
                            class="flex items-center gap-3 p-sm rounded-lg hover:bg-surface-container transition-colors font-label-md text-label-md text-on-surface">
                            <span class="material-symbols-outlined text-primary">description</span>
                            Manage Documents
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
</body>
</html>
